package com.mobisir.askexpertauto.genlib;

import java.util.Properties;
import java.util.concurrent.TimeUnit;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;

public class WebAction {
	private static WebDriver driver;
	private static  Properties XPATHREP;
	 public WebAction(WebDriver driver, Properties xpathRep)
	 {
		 this.driver = driver;
		 this.XPATHREP = xpathRep;
	 }
	 
	 public static WebElement getWebObject(String xpathKey)
		{
			try{
				return driver.findElement(By.xpath(XPATHREP.getProperty(xpathKey)));
			}
			catch(Throwable th)
			{
				System.out.println("Object "+XPATHREP.getProperty(xpathKey)+" not found");
				return null;
			}
		}
	public static  boolean isObjectExists(String xpathKey)
	{
			try{
				driver.findElement(By.xpath(XPATHREP.getProperty(xpathKey)));
				 return true;
			}
			catch(Throwable th)
			{
				return false;
			}
		}
		public  boolean isObjectNotExists(String xpathKey)
		{
			try{
				driver.findElement(By.xpath(XPATHREP.getProperty(xpathKey)));
				 return false;
			}
			catch(Throwable th)
			{
				return true;
			}
		}
		
		 public void waitPageLoad()
		{
			driver.manage().timeouts().implicitlyWait(120, TimeUnit.SECONDS);
		}
		

}
