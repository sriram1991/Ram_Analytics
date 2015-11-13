<html>
  <head>
    <meta charset="UTF-8">
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <title><?php echo PRODUCT_NAME;?></title>
    <link href="/static/theme/common/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="/static/theme/css/AdminLTE.css" rel="stylesheet" type="text/css" />

    <link href="/static/theme/common/font-awesome-4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="/static/theme/common/ionicons-1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- SKOL COMMON CSS -->
    <link href="/static/css/common/skol.css" rel="stylesheet" type="text/css"></link>
    <!-- JQuery Library 1.9 -->
    <script src="/static/theme/common/js/jquery.min.js" type="text/javascript"></script>
    <style type="text/css">
      #pdf { height: 100%; width:100%; }
      /*#alink { text-decoration: none; }*/
      #myframe { height: 600px; width: 100%; display: inline-block; }
      .panel-body{ height: 500px; }
      .answer_sheet{ overflow-y: auto; height: inherit;}
    </style>
  </head>
  
  <body>    
    <!-- Main content -->
    <section class="content test_page">
      <div class="row">
        
        <div class="col-xs-12 col-sm-6 col-md-6">
          <?php 
            $pageno = 1; 
            $question_paper = "NULL";
            if(isset($assessment_details)){
              $question_paper = $assessment_details['upload_ques_paper'];
            }
          ?>
          <div id="pdf" class="hidden-xs">
            <iframe id="myframe" src="/static/js/node-pdf.js/viewer.html"  onLoad="open_ques_paper('<?php if(isset($assessment_details)) echo $question_paper;?>');"></iframe>
          </div>
        </div>
          
        <div class="col-xs-12 col-sm-6 col-md-6">
          <form action="POST" action="#" name="StuAnsForm" id="StuAnsForm" role="form">
            
            <div class="panel panel-info">
              <!-- Panel Heading -->
              <div class="panel-heading" style="height: 60PX;">
                <div class="panel-title">
                  <i class="hidden-lg"><?php if(isset($assessment_details)) echo $test_name ; ?></i> Answer Sheet 
                  <!--<span class="pull-right" id="timer">Time Remaining: <i id="clock">12min</i></span>-->
                <br><span class="pull-left"> Remaining Time :<span id="durationmin"><?php echo $attempt_details['remaining_time'];?></span> min
                <span id="durationsec">0</span> sec </span>
                </div>
              </div>

              <!-- Panel Body -->
              <div class="panel-body">
                <div class="answer_sheet">
                  <table>
                    <tr>
                      <td align='middle' style='height:40px; width:45px;'>&nbsp;</td>
                      <td align='middle' style='height:40px; width:45px; padding-right:10%;'><label>1</label></td>
                      <td align='middle' style='height:40px; width:45px; padding-right:10%;'><label>2</label></td>
                      <td align='middle' style='height:40px; width:45px; padding-right:10%;'><label>3</label></td>
                      <td align='middle' style='height:40px; width:45px; padding-right:10%;'><label>4</label></td>
                    </tr>
                    <?php
                      $ans_key = explode(",",$assessment_details['answer_key']);
                      $stu_ans = explode(",",$attempt_details['student_answer']);
                      for($i=1; $i<=$assessment_details['no_of_questions'];$i++){
                        echo "<tr><td>$i</td>";
                          for($j=1; $j<=4; $j++){
                            if($j == $stu_ans[$i-1])
                            echo "<td style='height: 40px; width:45px;'><input type='radio' onclick='last_answered_test();' style='width: 1.5em; height: 1.5em;' name='question[".$i."]' id='option_".$j."' value='$j' checked></td>";
                          else
                           echo "<td style='height: 40px; width:45px;'><input type='radio' onclick='last_answered_test();' style='width: 1.5em; height: 1.5em;' name='question[".$i."]' id='option_".$j."' value='$j'></td>";
                         
                          }
                        echo  "</tr>";
                      }
                    ?>
                  </table>
                </div>
              </div>
            </div><!-- Panel Ended -->
          </form>
        </div>
      </div>
    </section>
  </body>
  <!-- ======================= Timer =============================-->
  <script type="text/javascript">
    var timer = false;
    var sec = 0;
    // var min="<?php echo $assessment_details['test_duration']; ?>";
    var min = 0;
    var first_attempt = "<?php echo $new_attempt;?>";
    if(first_attempt == "1"){
      min = parseInt("<?php echo $attempt_details['remaining_time'];?>") > 0 ? (parseInt("<?php echo $attempt_details['remaining_time'];?>") - 1) : 0;
      sec = parseInt("<?php echo $attempt_details['remaining_time'];?>") > 0 ? 59 : 0; 
    } else {
      var remaining = "<?php echo $attempt_details['remaining_time'];?>".split(":");
      min = remaining[0];
      sec = remaining[1];
      console.log(remaining);
    }
    $("span#durationmin").html(min);
    function startTimer() {
      console.log(window.timer);
      if(timer  == true) {
        id = window.setInterval(function(){
          if(sec > 0) {
            $("span#durationsec").html(--sec);
          } else if (sec == 0 && min != 0) {
              $("span#durationmin").html(--min);
              console.log('min :'+min);
              sec = 59;
              $("span#durationsec").html(sec);
          } else if(sec == 0 && min == 0) {
              window.clearInterval(id);
              submit_test();
          }
        },1000);
      
        // Window on Quit or Reload
        window.onbeforeunload= function(e){
          if(timer!= false){
            last_answered_test();
            timer = false;
            e  = e || window.event;
            if(e){
              e.returnValue= "TEST is in Progress";
              return "TEST is in Progress";
            } else {         
              e.returnValue= "TEST in Progress";
              return "TEST in Progress";
            }
          } else {
            console.log('timer is cleared');
          }
        }
      }
    // Get Current Minutes
    this.getMin = function(){
      return min;
    }
    // Get Current Seconds
    this.getSec = function(){
      return sec; 
    }
  }
  </script> 
  <script type="text/javascript">
    // PDF View Loding Script
    function open_ques_paper(mypath){
        document.getElementById('myframe').contentWindow.PDFView.open('/static/resource/questions/'+mypath);
        console.log(" open node pdf called "+mypath);
        // setTimeout(function() { pdf_page(<?php //echo $seekpos; ?>); }, 1000);
        // console.log("PDF Opended "+mypath+".pdf  at seekpos "+"<?php //echo $seekpos; ?>");
    }
    
    // Action: Getting Student Test Answers in string : ie 1,2#2,2
    function get_student_answers(no_of_questions) {
        var string = ""; 
        for (var i = 1; i <= no_of_questions; i++) {
            var ans = $('[name="question['+i+']"]:checked').val();
            if(ans == undefined || ans == "" || ans =="0" || ans =="null"){
                if(no_of_questions == i){
                    string+='null';
                } else {
                    string+= 'null,'; 
                } 
            } else {
                if(no_of_questions == i){
                    string+= ''+ans;
                } else {
                    string+= ''+ans+',';
                }
            }
        };
        return string;
    }

    // Last Answered
    function last_answered_test() {
      var attempt_id = "<?php echo $attempt_id; ?>";
      var last_student_answer = collect_student_answer();
      // send this attempt id and catch in controller
      $.ajax({
          type:"POST",
          url: "/student/last_answered_test",
          data: { 
            attempt_id: attempt_id, 
            last_student_answer: last_student_answer,
            duration : getMin()+":"+getSec()
          },
          success: function(response){
            console.log('last_answered_test updated '+response);
          }
      });
    }

    // Action: saving student test answers using ajax
    function save_student_answers(course_id,subject_name,test_id,test_name){
        // for confrimation please add confirm("Are you sure you want to submit the test ?")
        if (window.timer) {
            window.timer = false;
            console.log("save student timer "+window.timer);
        }
        $.ajax({
            type:"POST",
            url: "/student/save_student_answers",
            async : false,
            data: {
                student_answer: collect_student_answer(),
               test_score: '100',
                duration : getMin()+":"+getSec()
            },
            success: function(responce) {
                console.log('save test :'+responce);
                window.parent.closeModal();
                // $("#body-start_test_page").html('');
                // $('#start_test_page').modal('hide');
                // open_test_page(course_id,subject_name,test_id,test_name);
            }
        });
        
    }

    // Collect Students Answers
    function collect_student_answer() {
      return get_student_answers('<?php echo $assessment_details["no_of_questions"]; ?>');
    }

    // Submit Test
    function submit_test(){
      alert('Time out Press OK to Exit !');
      window.timer = false;
      <?php echo "save_student_answers($course_id,\"$subject_name\",$test_id,\"$test_name\");"?>
    }

    // General Submit
    function general_submit(event) {
      if(confirm("Are you sure you want to submit the test ?")){
        window.timer = false;
        <?php echo "save_student_answers($course_id,\"$subject_name\",$test_id,\"$test_name\");"?> 
      } else {
        window.preventDefault();
        return false;
      }
    }
    // Document Ready Code
    $(document).ready(function(){
        timer  = true;
        startTimer();

        $("button#submit_button").click(function() {
          window.timer  = false;
          min = "";
          sec = "";
          console.log(timer);
          
        });
    });
  </script>
</html>









