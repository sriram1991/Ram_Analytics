package com.mobisir.askexpertauto.driver;

import java.io.FileInputStream;
import java.util.ArrayList;
import java.util.List;

import org.apache.poi.sl.usermodel.Sheet;
import org.apache.poi.ss.usermodel.Cell;
import org.apache.poi.ss.usermodel.Row;
import org.apache.poi.ss.usermodel.Workbook;
import org.apache.poi.ss.usermodel.WorkbookFactory;


public class Scriptdriver {

	public List selectScript(String modName){
		ArrayList sList= new ArrayList();
		try {
			FileInputStream xlFile = new FileInputStream(".\\"+modName+".xlsx");
			WorkbookFactory xlWorkbook = (WorkbookFactory) WorkbookFactory.create(xlFile);
			org.apache.poi.ss.usermodel.Sheet sheetInstance = ((Workbook) xlWorkbook).getSheet("scripts");
			int rowCount = ((org.apache.poi.ss.usermodel.Sheet) sheetInstance).getPhysicalNumberOfRows();
			for(int index=0;index<rowCount;index++)
			{
				Row currRow =((org.apache.poi.ss.usermodel.Sheet) sheetInstance).getRow(index);
				Cell stateCell = currRow.getCell(1);
				String cellData = stateCell.getStringCellValue();
				if(cellData.equals("y")){
					System.out.println("ScriptName:" +currRow.getCell(0).getStringCellValue());
					Cell firstCell = currRow.getCell(0);
					sList.add(firstCell.getStringCellValue());
					if(currRow.getCell(0).getStringCellValue().equals("StLogin")){
						System.out.println("calling Login");
						//Login.StLogin();
					}
				}
			}
		} catch (Exception e) {
			e.printStackTrace();
		}
		return sList;		
	}

}
