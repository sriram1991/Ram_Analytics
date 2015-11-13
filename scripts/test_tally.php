<?php
/* This is PHP code to insert an entry in Tally. All required XML tags by Tally are taken here in a string and name for Ledger is taken by posted value from HTML form. */
$company_name 		= "Skol System Pvt.Ltd"; // This is going to Be Global Variable
$newLedgerName 		= "kantanand";
$parentGroupName 	= "Students";
// $LedgerName = createLedger($company_name,$newLedgerName,$parentGroupName);
// $AMOUNT = 500;
// $LedgerName = $newLedgerName;
// test_tally($company_name,$LedgerName,$AMOUNT);
exportxml();
function exportxml() {
	//$company_name = "INFINITEERCAM SOLAR SYSTEMS INDIA P LTD., - (from 1-Apr-2011)";
	//$company_name = "Sonovision-Aetos Technical Services Private Limited";
	//$company_name = "White Cross Health Initiatives Pvt Ltd.,";
	$company_name = "SKOL System Pvt Ltd";
	$output = exportTallyData($company_name,"List of Accounts");
	$output = str_replace('&#4;','',$output);
	$output = str_replace('UDF:','',$output);
	file_put_contents("../testxml1.xml",$output);
	$master_id=0;
	$output = exportTallyVouchers($company_name,$master_id);
	$output = str_replace('&#4;','',$output);
	$output = str_replace('UDF:','',$output);
	file_put_contents("../testxml.xml",$output);
	echo "complete";
}

function exportTallyData($company, $reportName) {
 	//$xmlValue = $this->xmlExport($company, $reportName);
	//$xmlValue = $this->xmlParamExport($company, $reportName, '1-4-2009', '5-4-2009');
 	$xmlValue = xmlParamExport($company, $reportName, '1-4-2015', '30-4-2016');
	//echo "XML value   ".$xmlValue."<br/><br/>";
	$output = callingCurl($xmlValue);
	// echo $output;
	return $output;
}
function exportTallyVouchers($company,$master_id) {
	//$xmlValue = $this->xmlExport($company, $reportName);
	//$xmlValue = $this->xmlParamExport($company, $reportName, '1-4-2009', '5-4-2009');
	$xmlValue = xmlVouchersExport($company,$master_id);
	//echo "XML value   ".$xmlValue."<br/><br/>";
	$output = callingCurl($xmlValue);
	// echo $output;
	return $output;
}
function xmlVouchersExport($company,$master_id) {
	
	$num_masterid = (int)$master_id;
	/*
	$exportXML = '<ENVELOPE><HEADER>
					    <VERSION>1</VERSION>
					    <TALLYREQUEST>Export</TALLYREQUEST>
					    <TYPE>Collection</TYPE>
					    <ID>Collection of Vouchers</ID>
					</HEADER>
					<BODY>
							<DESC>
							<STATICVARIABLES>
							<SVCURRENTCOMPANY>'.$company.'</SVCURRENTCOMPANY>
							<EXPLODEFLAG>Yes</EXPLODEFLAG>
							<SVEXPORTFORMAT>\$\$SysName:XML</SVEXPORTFORMAT>
							</STATICVARIABLES>
					<TDL>
					<TDLMESSAGE>
					<COLLECTION NAME="Collection of Vouchers" 
					ISMODIFY="No" ISFIXED="No" ISINITIALIZE="No" 
					ISOPTION="No" ISINTERNAL="No">
					  <TYPE>VOUCHER</TYPE> 
					  <FETCH> *,LEDGERENTRIES.*</FETCH>
					  <FILTERS>NoProfitSimple</FILTERS>
					  </COLLECTION>
					  <SYSTEM TYPE="Formulae" NAME="NoProfitSimple">
					         $MASTERID = 1                        
					</SYSTEM>
					  </TDLMESSAGE>
					  </TDL>
						</DESC>
							</BODY></ENVELOPE>	';
	*/
	$exportXML = '<ENVELOPE><HEADER>
			    <VERSION>1</VERSION>
			    <TALLYREQUEST>Export</TALLYREQUEST>
			    <TYPE>Collection</TYPE>
			    <ID>Collection of Vouchers</ID>
			</HEADER>
			<BODY>
					<DESC>
					<STATICVARIABLES>
					<SVCURRENTCOMPANY>'.$company.'</SVCURRENTCOMPANY>
					<EXPLODEFLAG>Yes</EXPLODEFLAG>
					<SVEXPORTFORMAT>\$\$SysName:XML</SVEXPORTFORMAT>
					</STATICVARIABLES>
			<TDL>
			<TDLMESSAGE>
			<COLLECTION NAME="Collection of Vouchers" 
			ISMODIFY="No" ISFIXED="No" ISINITIALIZE="No" 
			ISOPTION="No" ISINTERNAL="No">
			  <TYPE>VOUCHER</TYPE> 
			  <FETCH> *,LEDGERENTRIES.*</FETCH>
			  <FILTERS>NoProfitSimple</FILTERS>
			  </COLLECTION>
			  <SYSTEM TYPE="Formulae" NAME="NoProfitSimple">
			            $MASTERID &gt; '.$num_masterid.'                          
			</SYSTEM>
			  </TDLMESSAGE>
			  </TDL>
				</DESC>
					</BODY></ENVELOPE>	';
	return $exportXML ;
}

function xmlParamExport($company, $reportName, $fromdate, $todate) {
	$exportXML = "<ENVELOPE><HEADER>
						<TALLYREQUEST>Export Data</TALLYREQUEST>
					</HEADER>
					<BODY>
						<EXPORTDATA>
							<REQUESTDESC>
								<REPORTNAME>$reportName</REPORTNAME>
								<STATICVARIABLES>
									<SVCURRENTCOMPANY>$company</SVCURRENTCOMPANY>";
									// <SVFROMDATE>$fromdate</SVFROMDATE>
									// <SVTODATE>$todate</SVTODATE>
					$exportXML .=  "<SVEXPORTFORMAT>\$\$SysName:XML</SVEXPORTFORMAT>
								</STATICVARIABLES>
							</REQUESTDESC>
						</EXPORTDATA>
					</BODY>
				</ENVELOPE>"; 
	// echo $exportXML ;
	return $exportXML;
}

function test_tally($company_name,$LedgerName,$AMOUNT){
	$requestXML = "<ENVELOPE>".
					"<HEADER>".
					"<TALLYREQUEST>Import Data</TALLYREQUEST>".
					"</HEADER>".
					"<BODY>".
					"<IMPORTDATA>".
					"<REQUESTDESC>".
					"<REPORTNAME>All Masters</REPORTNAME>".
					"<STATICVARIABLES>".
					"<SVCURRENTCOMPANY>".$company_name."</SVCURRENTCOMPANY>".
					"</STATICVARIABLES>".
					"</REQUESTDESC>".
					"<REQUESTDATA>".
					"<TALLYMESSAGE  xmlns:UDF=\"TallyUDF\">".
					"<VOUCHER>".
						"<DATE>".date('Ymd')."</DATE>".
						"<NARRATION>Test Entry</NARRATION>".
						"<VOUCHERTYPENAME>Receipt</VOUCHERTYPENAME>".
						"<ALLLEDGERENTRIES.LIST>".
							"<LEDGERNAME>".$LedgerName."</LEDGERNAME>".
							"<ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>".
							"<AMOUNT>".$AMOUNT."</AMOUNT>".
						"</ALLLEDGERENTRIES.LIST>".
						"<ALLLEDGERENTRIES.LIST>".
							"<LEDGERNAME>Cash</LEDGERNAME>".
							"<ISDEEMEDPOSITIVE>Yes</ISDEEMEDPOSITIVE>".
							"<AMOUNT>-".$AMOUNT."</AMOUNT>".
						"</ALLLEDGERENTRIES.LIST>".
					"</VOUCHER>".
					"</TALLYMESSAGE>".
					"</REQUESTDATA>".
					"</IMPORTDATA>".
					"</BODY>".
					"</ENVELOPE>";
	$result = callingCurl($requestXML);
	if(isset($result)){
		echo "\n Voucher Recipt Inserted Succsssfully \n";
	}
}

function createLedger($company,$newLedgerName,$parentGroupName){
	$createLedger = "<ENVELOPE>".
						"<HEADER>".
							"<VERSION>1</VERSION>".
							"<TALLYREQUEST>Import</TALLYREQUEST>".
							"<TYPE>Data</TYPE>".
							"<ID>All Masters</ID>".
						"</HEADER>".
						"<BODY>".
							"<DESC>".
								"<STATICVARIABLES>".
									"<SVCURRENTCOMPANY>".$company."</SVCURRENTCOMPANY>".
									"<IMPORTDUPS>@@DUPCOMBINE</IMPORTDUPS>".
								"</STATICVARIABLES>".
							"</DESC>".
							"<DATA>".
								"<TALLYMESSAGE>".
									"<LEDGER NAME='".$newLedgerName."' Action ='Create'>".
										"<NAME>".$newLedgerName."</NAME>".
										"<PARENT>".$parentGroupName."</PARENT>".
										"<OPENINGBALANCE></OPENINGBALANCE>".
									"</LEDGER>".
								"</TALLYMESSAGE>".
							"</DATA>".
						"</BODY>".
					"</ENVELOPE>";
	$result = callingCurl($createLedger);
	// return $result;
	if(isset($result)){
		echo "\n Ledger Created \n";
		return $newLedgerName;
	} else {
		return false;
	}
}

// Function to Call Curl to Get Responce for Requested XML
function callingCurl($requestXML){
	//$server = '192.168.1.96:9000';
	$server = '122.180.84.113:9000';
	$headers = array( "Content-type: text/xml" ,"Content-length: ".strlen($requestXML) ,"Connection: close" );
		
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $server);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 100);
	curl_setopt($ch, CURLOPT_POST, true);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $requestXML);
	curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
	$data = curl_exec($ch);
	
	if(curl_errno($ch)){
		print curl_error($ch);
		echo "Some Thing Went Wrong ! while Connecting Tally Server !!";
	}else{
		echo "[ Request Accepted ]"."\n";
		echo "[ Tally Response Start: ]"."\n";
		print $data;
		echo "[ Tally Response Ended: ]"."\n";
		curl_close($ch);
	}
	return $data;
}

/* Actual code for importing goes here */
	/*"<LEDGERNAME>Amrita (Student)</LEDGERNAME>".*/
		//$server = '192.168.1.71:9000';
/*
		$server = '192.168.1.96:9000';
		$headers = array( "Content-type: text/xml" ,"Content-length: ".strlen($requestXML) ,"Connection: close" );
		
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $server);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 100);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $requestXML);
		curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
		$data = curl_exec($ch);
		
		if(curl_errno($ch)){
			print curl_error($ch);
			echo "  something went wrong..... try later";
		}else{
			echo " request accepted";
			print $data;
			curl_close($ch);
		}
*/
