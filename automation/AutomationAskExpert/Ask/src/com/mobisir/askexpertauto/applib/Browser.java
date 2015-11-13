package com.mobisir.askexpertauto.applib;

import java.util.Properties;
import java.util.concurrent.TimeUnit;

import org.openqa.selenium.WebDriver;
import org.openqa.selenium.chrome.ChromeDriver;
import org.openqa.selenium.firefox.FirefoxDriver;
import org.openqa.selenium.ie.InternetExplorerDriver;

public class Browser {

	private Properties testConfigProp;
	private Properties xpathRepo;
	private static WebDriver driver;
		public Browser(Properties testConfigProp)
	{
		this.testConfigProp = testConfigProp;
		this.open();
		this.connectToUrl();
	}
	
	public void open()
	{
		String browserType = testConfigProp.getProperty("browsertype");
		if(browserType.equals("firefox")){
			driver = new FirefoxDriver();
		}else if(browserType.equals("chrome")){
			System.setProperty("webdriver.chrome.driver", ".\\drivers\\chromedriver.exe");
			driver = new ChromeDriver();
		}else if(browserType.equals("ie")){
			System.setProperty("webdriver.ie.driver", ".\\drivers\\IEDriverServer.exe");
			driver = new InternetExplorerDriver();
		}
		
	}
	public WebDriver getDriver()
	{
		return this.driver;
	}
	public void connectToUrl()
	{
		driver.get(testConfigProp.getProperty("testurl"));
	}
	
	public void setGlobalTimeOut()
	{
		long timeoutValue = Long.parseLong(testConfigProp.getProperty("globaltimeout"));
		driver.manage().timeouts().implicitlyWait(timeoutValue, TimeUnit.SECONDS);
	}
	public void close()
	{
		driver.quit();
	}

}
