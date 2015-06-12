package br.edu.unilab.unicafe.bloqueio.model;

import java.io.BufferedReader;
import java.io.FileInputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.ArrayList;
import java.util.Scanner;



public class PerfilBloqueio {
	private ArrayList<Processo> listaDeProcessosAceitos;

	public ArrayList<Processo> getListaDeAceitos() {
		return this.listaDeProcessosAceitos;
	}

	private ArrayList<Processo> processosAtivos;

	public ArrayList<Processo> getProcessosAtivos(){
		return this.processosAtivos;
	}
	public PerfilBloqueio() {
		this.processosAtivos = new ArrayList<Processo>();
		this.listaDeProcessosAceitos = new ArrayList<Processo>();
	}

	public void addProcesso(Processo processo) {
		this.listaDeProcessosAceitos.add(processo);

	}

	public void setListaDeProcessosAceitos(ArrayList<Processo> processos) {
		this.listaDeProcessosAceitos = processos;
	}

	public void buscaAceitos() {
		this.listaDeProcessosAceitos = new ArrayList<Processo>();
		FileInputStream arquivo;
		try {
			arquivo = new FileInputStream("liberados.txt");
			BufferedReader linhaArquivo = new BufferedReader(
					new InputStreamReader(arquivo));

			this.listaDeProcessosAceitos.add(new Processo("System Idle Process", "", "0"));
			this.listaDeProcessosAceitos.add(new Processo("System", "", "4"));
			this.listaDeProcessosAceitos.add(new Processo("smss.exe", "", "404"));
			this.listaDeProcessosAceitos.add(new Processo("csrss.exe", "C:\\Windows\\system32\\csrss.exe", "580"));
			this.listaDeProcessosAceitos.add(new Processo("wininit.exe", "C:\\Windows\\system32\\wininit.exe", "660"));
			this.listaDeProcessosAceitos.add(new Processo("csrss.exe", "C:\\Windows\\system32\\csrss.exe", "680"));
			this.listaDeProcessosAceitos.add(new Processo("services.exe", "C:\\Windows\\system32\\services.exe", "748"));
			this.listaDeProcessosAceitos.add(new Processo("winlogon.exe", "C:\\Windows\\system32\\winlogon.exe", "764"));
			this.listaDeProcessosAceitos.add(new Processo("lsass.exe", "C:\\Windows\\system32\\lsass.exe", "792"));
			this.listaDeProcessosAceitos.add(new Processo("lsm.exe", "C:\\Windows\\system32\\lsm.exe", "800"));
			this.listaDeProcessosAceitos.add(new Processo("svchost.exe", "C:\\Windows\\system32\\svchost.exe", "908"));
			this.listaDeProcessosAceitos.add(new Processo("svchost.exe", "C:\\Windows\\system32\\svchost.exe", "988"));
			this.listaDeProcessosAceitos.add(new Processo("MsMpEng.exe", "c:\\Program Files\\Microsoft Security Client\\MsMpEng.exe", "620"));
			this.listaDeProcessosAceitos.add(new Processo("svchost.exe", "C:\\Windows\\System32\\svchost.exe", "452"));
			this.listaDeProcessosAceitos.add(new Processo("svchost.exe", "C:\\Windows\\System32\\svchost.exe", "1044"));
			this.listaDeProcessosAceitos.add(new Processo("svchost.exe", "C:\\Windows\\system32\\svchost.exe", "1076"));
			this.listaDeProcessosAceitos.add(new Processo("svchost.exe", "C:\\Windows\\system32\\svchost.exe", "1120"));
			this.listaDeProcessosAceitos.add(new Processo("TrustedInstaller.exe", "C:\\Windows\\servicing\\TrustedInstaller.exe", "1292"));
			this.listaDeProcessosAceitos.add(new Processo("svchost.exe", "C:\\Windows\\system32\\svchost.exe", "1596"));
			this.listaDeProcessosAceitos.add(new Processo("spoolsv.exe", "C:\\Windows\\System32\\spoolsv.exe", "1704"));
			this.listaDeProcessosAceitos.add(new Processo("TdmService.exe", "C:\\Program Files\\Dell\\Dell Data Protection\\Access\\Advanced\\Wave\\Trusted Drive Manager\\TdmService.exe", "1740"));
			this.listaDeProcessosAceitos.add(new Processo("svchost.exe", "C:\\Windows\\System32\\svchost.exe", "1760"));
			this.listaDeProcessosAceitos.add(new Processo("svchost.exe", "C:\\Windows\\system32\\svchost.exe", "1808"));
			this.listaDeProcessosAceitos.add(new Processo("armsvc.exe", "C:\\Program Files (x86)\\Common Files\\Adobe\\ARM\\1.0\\armsvc.exe", "2020"));
			this.listaDeProcessosAceitos.add(new Processo("EmbassyServer.exe", "C:\\Program Files\\Dell\\Dell Data Protection\\Access\\Advanced\\Wave\\EMBASSY Client Core\\EmbassyServer.exe", "1244"));
			this.listaDeProcessosAceitos.add(new Processo("FCUpdateService.exe", "C:\\Program Files (x86)\\Foxit Software\\Foxit Reader\\Foxit Cloud\\FCUpdateService.exe", "1800"));
			this.listaDeProcessosAceitos.add(new Processo("HeciServer.exe", "C:\\Program Files\\Intel\\iCLS Client\\HeciServer.exe", "2076"));
			this.listaDeProcessosAceitos.add(new Processo("IPROSetMonitor.exe", "C:\\Windows\\system32\\IProsetMonitor.exe", "2100"));
			this.listaDeProcessosAceitos.add(new Processo("IpOverUsbSvc.exe", "C:\\Program Files (x86)\\Common Files\\Microsoft Shared\\Phone Tools\\CoreCon\\11.0\\bin\\IpOverUsbSvc.exe", "2132"));
			this.listaDeProcessosAceitos.add(new Processo("LMIGuardianSvc.exe", "C:\\Program Files (x86)\\LogMeIn Hamachi\\LMIGuardianSvc.exe", "2284"));
			this.listaDeProcessosAceitos.add(new Processo("pbadrvsvc.exe", "C:\\Program Files\\Dell\\Dell Data Protection\\Access\\Advanced\\hapi64\\pbadrvsvc.exe", "2328"));
			this.listaDeProcessosAceitos.add(new Processo("sqlwriter.exe", "C:\\Program Files\\Microsoft SQL Server\\90\\Shared\\sqlwriter.exe", "2484"));
			this.listaDeProcessosAceitos.add(new Processo("svchost.exe", "C:\\Windows\\system32\\svchost.exe", "2504"));
			this.listaDeProcessosAceitos.add(new Processo("TeamViewer_Service.exe", "C:\\Program Files (x86)\\TeamViewer\\Version9\\TeamViewer_Service.exe", "2556"));
			this.listaDeProcessosAceitos.add(new Processo("VisualSVNServer.exe", "C:\\Program Files\\VisualSVN Server\\bin\\VisualSVNServer.exe", "2632"));
			this.listaDeProcessosAceitos.add(new Processo("WaveAMService.exe", "C:\\Program Files\\Dell\\Dell Data Protection\\Access\\Advanced\\Wave\\Authentication Manager\\WaveAMService.exe", "2736"));
			this.listaDeProcessosAceitos.add(new Processo("WLIDSVC.EXE", "C:\\Program Files\\Common Files\\Microsoft Shared\\Windows Live\\WLIDSVC.EXE", "2780"));
			this.listaDeProcessosAceitos.add(new Processo("hamachi-2.exe", "C:\\Program Files (x86)\\LogMeIn Hamachi\\hamachi-2.exe", "2884"));
			this.listaDeProcessosAceitos.add(new Processo("WLIDSVCM.EXE", "C:\\Program Files\\Common Files\\Microsoft Shared\\Windows Live\\WLIDSvcM.exe", "2896"));
			this.listaDeProcessosAceitos.add(new Processo("VisualSVNServer.exe", "C:\\Program Files\\VisualSVN Server\\bin\\VisualSVNServer.exe", "1456"));
			this.listaDeProcessosAceitos.add(new Processo("WmiPrvSE.exe", "C:\\Windows\\system32\\wbem\\wmiprvse.exe", "3536"));
			this.listaDeProcessosAceitos.add(new Processo("NisSrv.exe", "c:\\Program Files\\Microsoft Security Client\\NisSrv.exe", "3696"));
			this.listaDeProcessosAceitos.add(new Processo("svchost.exe", "C:\\Windows\\system32\\svchost.exe", "4000"));
			this.listaDeProcessosAceitos.add(new Processo("upeksvr.exe", "C:\\Program Files\\Common Files\\SPBA\\upeksvr.exe", "4220"));
			this.listaDeProcessosAceitos.add(new Processo("taskhost.exe", "C:\\Windows\\system32\\taskhost.exe", "4580"));
			this.listaDeProcessosAceitos.add(new Processo("dwm.exe", "C:\\Windows\\system32\\Dwm.exe", "4588"));
			this.listaDeProcessosAceitos.add(new Processo("explorer.exe", "C:\\Windows\\Explorer.EXE", "4668"));
			this.listaDeProcessosAceitos.add(new Processo("GoogleCrashHandler.exe", "C:\\Program Files (x86)\\Google\\Update\\1.3.26.9\\GoogleCrashHandler.exe", "4960"));
			this.listaDeProcessosAceitos.add(new Processo("GoogleCrashHandler64.exe", "C:\\Program Files (x86)\\Google\\Update\\1.3.26.9\\GoogleCrashHandler64.exe", "4984"));
			this.listaDeProcessosAceitos.add(new Processo("SearchIndexer.exe", "C:\\Windows\\system32\\SearchIndexer.exe", "5080"));
			this.listaDeProcessosAceitos.add(new Processo("RtDCpl64.exe", "C:\\Program Files\\Realtek\\Audio\\HDA\\RtDCpl64.exe", "4428"));
			this.listaDeProcessosAceitos.add(new Processo("TdmNotify.exe", "C:\\Program Files\\Dell\\Dell Data Protection\\Access\\Advanced\\Wave\\Trusted Drive Manager\\TdmNotify.exe", "4856"));
			this.listaDeProcessosAceitos.add(new Processo("igfxtray.exe", "C:\\Windows\\System32\\igfxtray.exe", "4864"));
			this.listaDeProcessosAceitos.add(new Processo("hkcmd.exe", "C:\\Windows\\System32\\hkcmd.exe", "4896"));
			this.listaDeProcessosAceitos.add(new Processo("igfxpers.exe", "C:\\Windows\\System32\\igfxpers.exe", "1412"));
			this.listaDeProcessosAceitos.add(new Processo("msseces.exe", "C:\\Program Files\\Microsoft Security Client\\msseces.exe", "4920"));
			this.listaDeProcessosAceitos.add(new Processo("OcsSystray.exe", "C:\\Program Files (x86)\\OCS Inventory Agent\\OcsSystray.exe", "4768"));
			this.listaDeProcessosAceitos.add(new Processo("ICCProxy.exe", "C:\\Program Files (x86)\\Intel\\Intel(R) Integrated Clock Controller Service\\ICCProxy.exe", "4444"));
			this.listaDeProcessosAceitos.add(new Processo("OcsService.exe", "C:\\Program Files (x86)\\OCS Inventory Agent\\OcsService.exe", "2672"));
			this.listaDeProcessosAceitos.add(new Processo("IAStorDataMgrSvc.exe", "C:\\Program Files (x86)\\Intel\\Intel(R) Rapid Storage Technology\\IAStorDataMgrSvc.exe", "1560"));
			this.listaDeProcessosAceitos.add(new Processo("jhi_service.exe", "C:\\Program Files (x86)\\Intel\\Intel(R) Management Engine Components\\DAL\\jhi_service.exe", "336"));
			this.listaDeProcessosAceitos.add(new Processo("LMS.exe", "C:\\Program Files (x86)\\Intel\\Intel(R) Management Engine Components\\LMS\\LMS.exe", "2440"));
			this.listaDeProcessosAceitos.add(new Processo("chrome.exe", "C:\\Program Files (x86)\\Google\\Chrome\\Application\\chrome.exe", "1968"));
			this.listaDeProcessosAceitos.add(new Processo("chrome.exe", "C:\\Program Files (x86)\\Google\\Chrome\\Application\\chrome.exe", "5004"));
			this.listaDeProcessosAceitos.add(new Processo("chrome.exe", "C:\\Program Files (x86)\\Google\\Chrome\\Application\\chrome.exe", "1360"));
			this.listaDeProcessosAceitos.add(new Processo("chrome.exe", "C:\\Program Files (x86)\\Google\\Chrome\\Application\\chrome.exe", "3444"));
			this.listaDeProcessosAceitos.add(new Processo("TSVNCache.exe", "C:\\Program Files\\TortoiseSVN\\bin\\TSVNCache.exe", "2996"));
			this.listaDeProcessosAceitos.add(new Processo("javaw.exe", "C:\\Program Files\\Java\\jdk1.7.0_75\\bin\\javaw.exe", "5632"));
			this.listaDeProcessosAceitos.add(new Processo("powershell.exe", "C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\PowerShell.exe", "5728"));
			this.listaDeProcessosAceitos.add(new Processo("conhost.exe", "C:\\Windows\\system32\\conhost.exe", "5736"));
			this.listaDeProcessosAceitos.add(new Processo("javaw.exe", "C:\\Program Files\\Java\\jdk1.7.0_75\\bin\\javaw.exe", "6056"));
			this.listaDeProcessosAceitos.add(new Processo("powershell.exe", "C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\PowerShell.exe", "4368"));
			this.listaDeProcessosAceitos.add(new Processo("conhost.exe", "C:\\Windows\\system32\\conhost.exe", "5136"));
			this.listaDeProcessosAceitos.add(new Processo("javaw.exe", "C:\\Program Files\\Java\\jdk1.7.0_75\\bin\\javaw.exe", "5448"));
			this.listaDeProcessosAceitos.add(new Processo("powershell.exe", "C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\PowerShell.exe", "3388"));
			this.listaDeProcessosAceitos.add(new Processo("conhost.exe", "C:\\Windows\\system32\\conhost.exe", "5464"));
			this.listaDeProcessosAceitos.add(new Processo("javaw.exe", "C:\\Program Files\\Java\\jdk1.7.0_75\\bin\\javaw.exe", "5328"));
			this.listaDeProcessosAceitos.add(new Processo("powershell.exe", "C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\PowerShell.exe", "5748"));
			this.listaDeProcessosAceitos.add(new Processo("conhost.exe", "C:\\Windows\\system32\\conhost.exe", "2460"));
			this.listaDeProcessosAceitos.add(new Processo("javaw.exe", "C:\\Program Files\\Java\\jdk1.7.0_75\\bin\\javaw.exe", "4164"));
			this.listaDeProcessosAceitos.add(new Processo("powershell.exe", "C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\PowerShell.exe", "5972"));
			this.listaDeProcessosAceitos.add(new Processo("conhost.exe", "C:\\Windows\\system32\\conhost.exe", "5948"));
			this.listaDeProcessosAceitos.add(new Processo("javaw.exe", "C:\\Program Files\\Java\\jdk1.7.0_75\\bin\\javaw.exe", "5172"));
			this.listaDeProcessosAceitos.add(new Processo("powershell.exe", "C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\PowerShell.exe", "5472"));
			this.listaDeProcessosAceitos.add(new Processo("conhost.exe", "C:\\Windows\\system32\\conhost.exe", "5268"));
			this.listaDeProcessosAceitos.add(new Processo("javaw.exe", "C:\\Program Files\\Java\\jdk1.7.0_75\\bin\\javaw.exe", "5804"));
			this.listaDeProcessosAceitos.add(new Processo("powershell.exe", "C:\\Windows\\System32\\WindowsPowerShell\\v1.0\\PowerShell.exe", "3808"));
			this.listaDeProcessosAceitos.add(new Processo("conhost.exe", "C:\\Windows\\system32\\conhost.exe", "2512"));
			this.listaDeProcessosAceitos.add(new Processo("chrome.exe", "C:\\Program Files (x86)\\Google\\Chrome\\Application\\chrome.exe", "3792"));
			this.listaDeProcessosAceitos.add(new Processo("chrome.exe", "C:\\Program Files (x86)\\Google\\Chrome\\Application\\chrome.exe", "1228"));
			this.listaDeProcessosAceitos.add(new Processo("chrome.exe", "C:\\Program Files (x86)\\Google\\Chrome\\Application\\chrome.exe", "3280"));
			this.listaDeProcessosAceitos.add(new Processo("chrome.exe", "C:\\Program Files (x86)\\Google\\Chrome\\Application\\chrome.exe", "5868"));
			this.listaDeProcessosAceitos.add(new Processo("chrome.exe", "C:\\Program Files (x86)\\Google\\Chrome\\Application\\chrome.exe", "5280"));
			this.listaDeProcessosAceitos.add(new Processo("chrome.exe", "C:\\Program Files (x86)\\Google\\Chrome\\Application\\chrome.exe", "6712"));
			this.listaDeProcessosAceitos.add(new Processo("conhost.exe", "C:\\Windows\\system32\\conhost.exe", "6360"));
			this.listaDeProcessosAceitos.add(new Processo("notepad.exe", "C:\\Windows\\system32\\notepad.exe", "5396"));
			this.listaDeProcessosAceitos.add(new Processo("wampmanager.exe", "C:\\wamp\\wampmanager.exe", "6908"));
			this.listaDeProcessosAceitos.add(new Processo("httpd.exe", "c:\\wamp\\bin\\apache\\apache2.4.9\\bin\\httpd.exe", "5176"));
			this.listaDeProcessosAceitos.add(new Processo("mysqld.exe", "c:\\wamp\\bin\\mysql\\mysql5.6.17\\bin\\mysqld.exe", "6452"));
			this.listaDeProcessosAceitos.add(new Processo("httpd.exe", "C:\\wamp\\bin\\apache\\apache2.4.9\\bin\\httpd.exe", "6352"));
			this.listaDeProcessosAceitos.add(new Processo("chrome.exe", "C:\\Program Files (x86)\\Google\\Chrome\\Application\\chrome.exe", "6604"));
			this.listaDeProcessosAceitos.add(new Processo("scalc.exe", "C:\\Program Files (x86)\\LibreOffice 4\\program\\scalc.exe", "2988"));
			this.listaDeProcessosAceitos.add(new Processo("soffice.exe", "C:\\Program Files (x86)\\LibreOffice 4\\program\\soffice.exe", "6368"));
			this.listaDeProcessosAceitos.add(new Processo("soffice.bin", "C:\\Program Files (x86)\\LibreOffice 4\\program\\soffice.bin", "3912"));
			this.listaDeProcessosAceitos.add(new Processo("chrome.exe", "C:\\Program Files (x86)\\Google\\Chrome\\Application\\chrome.exe", "3896"));
			this.listaDeProcessosAceitos.add(new Processo("chrome.exe", "C:\\Program Files (x86)\\Google\\Chrome\\Application\\chrome.exe", "3564"));
			this.listaDeProcessosAceitos.add(new Processo("audiodg.exe", "", "6356"));
			this.listaDeProcessosAceitos.add(new Processo("WINWORD.EXE", "C:\\Program Files (x86)\\Microsoft Office\\Office15\\WINWORD.EXE", "5964"));
			this.listaDeProcessosAceitos.add(new Processo("EXCEL.EXE", "C:\\Program Files (x86)\\Microsoft Office\\Office15\\EXCEL.EXE", "7340"));
			this.listaDeProcessosAceitos.add(new Processo("notepad.exe", "C:\\Windows\\system32\\notepad.exe", "7936"));
			this.listaDeProcessosAceitos.add(new Processo("notepad++.exe", "C:\\Program Files (x86)\\Notepad++\\notepad++.exe", "6196"));
			this.listaDeProcessosAceitos.add(new Processo("mspaint.exe", "C:\\Windows\\system32\\mspaint.exe", "7516"));
			this.listaDeProcessosAceitos.add(new Processo("firefox.exe", "C:\\Program Files (x86)\\Mozilla Firefox\\firefox.exe", "7912"));
			this.listaDeProcessosAceitos.add(new Processo("iexplore.exe", "C:\\Program Files\\Internet Explorer\\iexplore.exe", "7200"));
			this.listaDeProcessosAceitos.add(new Processo("iexplore.exe", "C:\\Program Files (x86)\\Internet Explorer\\IEXPLORE.EXE", "7264"));
			this.listaDeProcessosAceitos.add(new Processo("plugin-container.exe", "C:\\Program Files (x86)\\Mozilla Firefox\\plugin-container.exe", "7236"));
			this.listaDeProcessosAceitos.add(new Processo("FlashPlayerPlugin_16_0_0_305.exe", "C:\\Windows\\SysWOW64\\Macromed\\Flash\\FlashPlayerPlugin_16_0_0_305.exe", "7288"));
			this.listaDeProcessosAceitos.add(new Processo("FlashPlayerPlugin_16_0_0_305.exe", "C:\\Windows\\SysWOW64\\Macromed\\Flash\\FlashPlayerPlugin_16_0_0_305.exe", "8212"));
			this.listaDeProcessosAceitos.add(new Processo("FlashUtil64_16_0_0_305_ActiveX.exe", "C:\\Windows\\system32\\Macromed\\Flash\\FlashUtil64_16_0_0_305_ActiveX.exe", "8388"));
			this.listaDeProcessosAceitos.add(new Processo("WinRAR.exe", "C:\\Program Files\\WinRAR\\WinRAR.exe", "8564"));
			this.listaDeProcessosAceitos.add(new Processo("wmplayer.exe", "C:\\Program Files (x86)\\Windows Media Player\\wmplayer.exe", "5888"));
			this.listaDeProcessosAceitos.add(new Processo("SearchProtocolHost.exe", "C:\\Windows\\system32\\SearchProtocolHost.exe", "8852"));
			this.listaDeProcessosAceitos.add(new Processo("SearchFilterHost.exe", "C:\\Windows\\system32\\SearchFilterHost.exe", "8628"));
			this.listaDeProcessosAceitos.add(new Processo("javaw.exe", "C:\\Program Files\\Java\\jdk1.7.0_75\\bin\\javaw.exe", "7476"));
			this.listaDeProcessosAceitos.add(new Processo("WMIC.exe", "C:\\Windows\\System32\\Wbem\\wmic.exe", "9036"));
			this.listaDeProcessosAceitos.add(new Processo("conhost.exe", "C:\\Windows\\system32\\conhost.exe", "8724"));
			this.listaDeProcessosAceitos.add(new Processo("WmiPrvSE.exe", "C:\\Windows\\system32\\wbem\\wmiprvse.exe", "7068"));
			this.listaDeProcessosAceitos.add(new Processo("explorer.exe", "C:\\Windows\\explorer.exe", "0"));
			this.listaDeProcessosAceitos.add(new Processo("igfxsrvc.exe", "C:\\Windows\\system32\\igfxsrvc.exe", "0"));
			this.listaDeProcessosAceitos.add(new Processo("eclipse.exe", "\\\\DTI43\\arquivos\\jefponte\\Documents\\eclipse\\eclipse.exe", "944"));
			this.listaDeProcessosAceitos.add(new Processo("UniCafeClient.exe", "C:\\unicafe\\UniCafeClient.exe", "944"));
			this.listaDeProcessosAceitos.add(new Processo("taskeng.exe", "C:\\Windows\\system32\\taskeng.exe", "944"));
			this.listaDeProcessosAceitos.add(new Processo("javaw.exe", "C:\\Program Files\\Java\\jre1.8.0_31\\bin\\javaw.exe", "944"));
			this.listaDeProcessosAceitos.add(new Processo("tasklist.exe", "C:\\Windows\\system32\\tasklist.exe", "944"));
			this.listaDeProcessosAceitos.add(new Processo("WUDFHost.exe", "C:\\Windows\\System32\\WUDFHost.exe", "944"));
			this.listaDeProcessosAceitos.add(new Processo("dllhost.exe", "C:\\Windows\\system32\\DllHost.exe", "944"));
			this.listaDeProcessosAceitos.add(new Processo("UniCafeClient.exe", "C:\\Program Files (x86)\\UniCafe\\UniCafeCLient.exe", "944"));
			this.listaDeProcessosAceitos.add(new Processo("sppsvc.exe", "C:\\Windows\\system32\\sppsvc.exe", "944"));
			this.listaDeProcessosAceitos.add(new Processo("eclipse.exe", "C:\\arquivos\\jefponte\\Documents\\eclipse\\eclipse.exe", "944"));
			this.listaDeProcessosAceitos.add(new Processo("AAM Updates Notifier.exe", "C:\\Program Files (x86)\\Common Files\\Adobe\\OOBE\\PDApp\\UWA\\AAM Updates Notifier.exe", "944"));
			this.listaDeProcessosAceitos.add(new Processo("java.exe", "C:\\ProgramData\\Oracle\\Java\\javapath\\java.exe", "944"));
			this.listaDeProcessosAceitos.add(new Processo("explorer.exe", "", "944"));
			this.listaDeProcessosAceitos.add(new Processo("Connect.Service.ContentService.exe", "C:\\Program Files (x86)\\Autodesk\\Content Service\\Connect.Service.ContentService.exe", "944"));
			this.listaDeProcessosAceitos.add(new Processo("WMIC.exe", "C:\\Windows\\SysWOW64\\Wbem\\wmic.exe", "944"));
			this.listaDeProcessosAceitos.add(new Processo("rundll32.exe", "C:\\Windows\\System32\\rundll32.exe", "944"));
			this.listaDeProcessosAceitos.add(new Processo("rundll32.exe", "C:\\Windows\\System32\\RunDll32.exe", "944"));
			this.listaDeProcessosAceitos.add(new Processo("wmpnetwk.exe", "C:\\Program Files\\Windows Media Player\\wmpnetwk.exe", "944"));
			this.listaDeProcessosAceitos.add(new Processo("explorer.exe", "C:\\Windows\\SysWOW64\\explorer.exe", "944"));
			this.listaDeProcessosAceitos.add(new Processo("javaw.exe", "C:\\Program Files\\Java\\jre7\\bin\\javaw.exe", "944"));
			this.listaDeProcessosAceitos.add(new Processo("taskkill.exe", "C:\\Windows\\SysWOW64\\taskkill.exe", "944"));
			while (linhaArquivo.ready()) {
				String linha = linhaArquivo.readLine();
				String[] vDados = linha.split("[,]");
				try{
					@SuppressWarnings("unused")
					Processo p = new Processo(vDados[1], vDados[0], vDados[2]);
					//System.out.println("this.listaDeProcessosAceitos.add(new Processo(\""+vDados[1]+"\", \""+vDados[0]+"\", \""+vDados[2]+"\"));");
					this.listaDeProcessosAceitos.add(new Processo(vDados[1], vDados[0], vDados[2]));
				}catch(ArrayIndexOutOfBoundsException fora){
					System.out.println("Vetor foi fora. Mas tem problema não, continua");
					
				}
			//	System.out.println(linha);
				
			}
			linhaArquivo.close();

		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		//this.listaDeProcessosAceitos = new ArrayList<Processo>();
		
		
		/*
		

		 */

	}

	public void buscaAtivos() {

		this.processosAtivos = new ArrayList<Processo>();
		Process process;
		Scanner leitor;

		try {

			process = Runtime
					.getRuntime()
					.exec(" wmic process  get ProcessID, Name, ExecutablePath /FORMAT:CSV");
			leitor = new Scanner(process.getInputStream());

			int i = 0;
			while (leitor.hasNext()) {
				String linha = leitor.nextLine();
				i++;
				if (i < 4) {
					continue;
				}
				if ((i >= 4) && (i % 2 == 0)) {
					continue;
				}

				//System.out.println(linha);
				String[] vDados = linha.split("[,]");
				this.processosAtivos.add(new Processo(vDados[2], vDados[1], vDados[3]));

				// System.out.println("ID: "+vDados[3]+", Imagem: "+vDados[2]+", pasta: "+vDados[1].replace("","").toString());

			}

		} catch (IOException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}				
				
	}

	public void comparaEMata() {

		boolean existeNaLista = false;
		for (Processo processoAtivo : this.processosAtivos) {
			existeNaLista = false;
			if(processoAtivo.getExecutablePath().length() > 5){
				if(processoAtivo.getExecutablePath().substring(0, 5).equals("C:\\Pr") || processoAtivo.getExecutablePath().substring(0, 5).equals("C:\\Wi")){
					
					//System.out.println("Foi");
					//System.out.println(processoAtivo.getExecutablePath().substring(0, 4));
					existeNaLista = true;
					continue;
				}
			}
			for (Processo processoAceito : this.listaDeProcessosAceitos) {
	
				if (processoAtivo.equals(processoAceito)) {
					existeNaLista = true;
					break;

				}
				

			}
			if (!existeNaLista) {
				
				

				try {

					//System.out.println(processoAtivo.getImagem()
					//		+ " N�o existe na lista. Deletaaar.");
					//JOptionPane.showMessageDialog(null, "Meu Amor, não pode executar "+ processoAtivo.getImagem()+" - "+processoAtivo.getExecutablePath());
					//System.out.println("Meu Amor, não pode executar "+ processoAtivo.getImagem()+" - "+processoAtivo.getExecutablePath());
					//new Log("Matei Um processo \n"+processoAtivo.getExecutablePath()+","+processoAtivo.getImagem());
					Runtime.getRuntime().exec(" taskkill /PID \"" + processoAtivo.getProcessId()+"\" /F");
					if(processoAtivo.getExecutablePath().length() > 5){
						
						System.out.println("Processo Bloqueado: "+processoAtivo.getExecutablePath()+","+processoAtivo.getImagem()+",123");	
						
					}      
					

					/*
					while (leitor.hasNext()) {
						System.out.println(leitor.nextLine());
					}
					*/

				} catch (Exception e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
			}

		}

	}

	public void mostraProcessos() {
		for (Processo p : this.processosAtivos) {
			System.out.println(p);
		}
	}
}
