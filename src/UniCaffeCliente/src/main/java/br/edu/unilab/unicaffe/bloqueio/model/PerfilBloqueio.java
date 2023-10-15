package br.edu.unilab.unicaffe.bloqueio.model;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileWriter;
import java.io.IOException;
import java.io.InputStreamReader;
import java.util.Vector;
import java.util.Collection;
import java.util.Iterator;
import java.util.Scanner;

import br.edu.unilab.unicaffe.util.Log;

/**
 * 
 * Classe gerencia listas de bloqueios de processos.
 * 
 * @author Jefferson Uchôa Ponte
 * 
 *
 */
public class PerfilBloqueio {
	/**
	 * Lista com os processos que não serão bloqueados.
	 */
	private Collection<Processo> listaDeProcessosAceitos;
	/**
	 * Lista com os processo em execução pelo sistema operacional.
	 */
	private Collection<Processo> processosAtivos;

	/**
	 * Lista com os processos que foram mortos.
	 */
	private Collection<Processo> listaDeBloqueados;

	/**
	 * 
	 * @return Collection listaDeBloqueados
	 */
	public Collection<Processo> getListaDeBloqueados() {
		return listaDeBloqueados;
	}

	/**
	 * 
	 * @param listaDeBloqueados
	 */
	public void setListaDeBloqueados(Collection<Processo> listaDeBloqueados) {
		this.listaDeBloqueados = listaDeBloqueados;
	}

	/**
	 * 
	 * @return a lista de processos que não serão bloqueados.
	 */
	public Collection<Processo> getListaDeAceitos() {
		return this.listaDeProcessosAceitos;
	}

	/**
	 * 
	 * @return a lista de processos em execução pelo sistema operacional.
	 */
	public Collection<Processo> getProcessosAtivos() {
		return this.processosAtivos;
	}

	/**
	 * Constroi o objeto PerfilBloqueio.
	 */
	public PerfilBloqueio() {
		this.processosAtivos = new Vector<Processo>();
		this.listaDeProcessosAceitos = new Vector<Processo>();
		this.listaDeBloqueados = new Vector<Processo>();
	}

	/**
	 * Adiciona processo na lista de processos aceitos.
	 * 
	 * @param processo
	 */
	public void addProcesso(Processo processo) {
		this.listaDeProcessosAceitos.add(processo);

	}

	/**
	 * Define uma lista de processos aceitos.
	 * 
	 * @param processos
	 */
	public void setListaDeProcessosAceitos(Collection<Processo> processos) {
		this.listaDeProcessosAceitos = processos;
	}

	/**
	 * 
	 * @return processos aceitos do windows 10
	 * 
	 */
	public Collection<Processo> buscaAceitosWindows10() {
		Collection<Processo> lista = new Vector<Processo>();
		

		return lista;
	}

	/**
	 * Alimenta lista de processos aceitos.
	 */

	public void buscaAceitos() {
		this.listaDeProcessosAceitos.add(new Processo("ASCService.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("BrowserCleaner.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("ctfmon.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("dasHost.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("dwm.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("fontdrvhost.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("Memory Compression", ""));
		this.listaDeProcessosAceitos.add(new Processo("Monitor.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("mqsvc.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("Monitor.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("PubMonitor.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("Registry", ""));
		this.listaDeProcessosAceitos.add(new Processo("scpbradserv.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("SecurityHealthService.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("sedsvc.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("SgrmBroker.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("tv_w32.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("tv_x64.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("WmiApSrv.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("RuntimeBroker.exe", ""));;
		this.listaDeProcessosAceitos.add(new Processo("jp2launcher.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("cb_console_runner.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("SearchIndexer.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("ArcMap.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("EXCEL.EXE", ""));
		this.listaDeProcessosAceitos.add(new Processo("wsqmcons.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("w.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("ngen.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("reg.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("netbeans.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("WINWORD.EXE", ""));
		this.listaDeProcessosAceitos.add(new Processo("System Idle Process", ""));
		this.listaDeProcessosAceitos.add(new Processo("cc1.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("MSOHTMED.EXE", ""));
		this.listaDeProcessosAceitos.add(new Processo("System", ""));
		this.listaDeProcessosAceitos.add(new Processo("smss.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("audiodg.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("explorer.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("csrss.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("wininit.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("services.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("lsass.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("armsvc.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("lsm.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("TabTip.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("WLIDSVCM.EXE", ""));
		this.listaDeProcessosAceitos.add(new Processo("wisptis.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("Connect.Service.ContentService.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("svchost.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("taskkill.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("TrustedInstaller.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("spoolsv.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("OcsService.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("WaveAMService.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("LMS.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("gbpsv.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("jhi_service.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("WmiPrvSE.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("TdmService.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("winlogon.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("IAStorDataMgrSvc.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("taskeng.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("MsMpEng.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("eclipse.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("dllhost.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("pbadrvsvc.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("sppsvc.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("consent.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("javaw.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("igfxCUIService.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("TabTip32.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("WLIDSVC.EXE", ""));
		this.listaDeProcessosAceitos.add(new Processo("EmbassyServer.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("HeciServer.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("IPROSetMonitor.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("oracle.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("TNSLSNR.EXE", ""));
		this.listaDeProcessosAceitos.add(new Processo("StkCSrv.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("TeamViewer_Service.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("NisSrv.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("upeksvr.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("PresentationFontCache.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("taskhost.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("AcroRd32.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("mmc.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("conhost.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("WUDFHost.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("WeatherService.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("UpdatePlatform.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("ArcGISAdmin.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("FNPLicensingService.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("OSPPSVC.EXE", ""));
		this.listaDeProcessosAceitos.add(new Processo("VSSVC.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("wsceaa.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("CloudOPTClient.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("SketchUp.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("WMIC.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("setup_wm.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("soffice.bin", ""));
		this.listaDeProcessosAceitos.add(new Processo("vlc.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("wlstartup.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("firefox.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("plugin-container.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("blender.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("SketchBookDesigner.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("Dropbox.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("soffice.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("GfxUI.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("cvtres.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("GoogleUpdate.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("Updater.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("wmplayer.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("notepad.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("unregmp2.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("SearchFilterHost.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("net1.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("OCSInventory.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("mobsync.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("chrome.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("cmd", ""));
		this.listaDeProcessosAceitos.add(new Processo("FlashPlayerUpdateService.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("igfxsrvc.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("IAStorIcon.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("OCS-NG-Windows-Agent-Setup.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("rundll32.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("wicainventory.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("core.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("wuauclt.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("jucheck.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("makecab.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("SearchProtocolHost.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("scpbradguard.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("attrib.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("CompatTelRunner.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("mscorsvw.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("LsaIso.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("Secure System", ""));

		

		this.listaDeProcessosAceitos.add(new Processo("vds.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("SppExtComObj.Exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("MoUsoCoreWorker.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("wermgr.exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("SppExtComObj.Exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("SppExtComObj.Exe", ""));
		this.listaDeProcessosAceitos.add(new Processo("Secure System", ""));
		this.listaDeProcessosAceitos.add(new Processo("Secure System", ""));
		
		
		this.listaDeProcessosAceitos.add(new Processo("WWAHost.exe", "C:\\WINDOWS\\system32\\wwahost.exe"));
		this.listaDeProcessosAceitos.add(new Processo("OneDriveSetup.exe", "C:\\Windows\\SysWOW64\\OneDriveSetup.exe"));
		this.listaDeProcessosAceitos.add(new Processo("wlanext.exe", "C:\\WINDOWS\\system32\\WLANExt.exe"));
		this.listaDeProcessosAceitos.add(new Processo("backgroundTaskHost.exe", "C:\\WINDOWS\\system32\\backgroundTaskHost.exe"));
		this.listaDeProcessosAceitos.add(new Processo("RuntimeBroker.exe", "C:\\Windows\\System32\\RuntimeBroker.exe"));
		this.listaDeProcessosAceitos.add(new Processo("sihost.exe.exe", "c:\\windows\\system32\\sihost.exe"));
		this.listaDeProcessosAceitos.add(new Processo("smartscreen.exe", "C:\\Windows\\System32\\smartscreen.exe"));
		this.listaDeProcessosAceitos.add(new Processo("taskhostw.exe", "c:\\windows\\system32\\taskhostw.exe"));
		this.listaDeProcessosAceitos.add(new Processo("SearchUI.exe", "C:\\Windows\\SystemApps\\Microsoft.Windows.Cortana_cw5n1h2txyewy\\SearchUI.exe"));
		this.listaDeProcessosAceitos.add(new Processo("ShellExperienceHost.exe", "C:\\Windows\\SystemApps\\ShellExperienceHost_cw5n1h2txyewy\\ShellExperienceHost.exe"));
		this.listaDeProcessosAceitos.add(new Processo("atieclxx.exe", "C:\\Windows\\system32\\atieclxx.exe"));
		this.listaDeProcessosAceitos.add(new Processo("sihost.exe", "C:\\Windows\\system32\\sihost.exe"));																					// iniciar
		this.listaDeProcessosAceitos.add(new Processo("WmiApSrv.exe", "C:\\Windows\\system32\\wbem\\WmiApSrv.exe"));
		this.listaDeProcessosAceitos.add(new Processo("ApplicationFrameHost.exe", "C:\\Windows\\system32\\ApplicationFrameHost.exe"));
		this.listaDeProcessosAceitos.add(new Processo("atieclxx.exe", "C:\\Windows\\system32\\atieclxx.ex"));
		this.listaDeProcessosAceitos.add(new Processo("atiesrxx.exe", "C:\\Windows\\system32\\atiesrxx.exe"));
		this.listaDeProcessosAceitos.add(new Processo("MicrosoftEdgeCP.exe","C:\\Windows\\SystemApps\\Microsoft.MicrosoftEdge_8wekyb3d8bbwe\\MicrosoftEdgeCP.exe"));
		this.listaDeProcessosAceitos.add(new Processo("MicrosoftEdge.exe", "C:\\Windows\\SystemApps\\Microsoft.MicrosoftEdge_8wekyb3d8bbwe\\MicrosoftEdge.exe"));
		this.listaDeProcessosAceitos.add(new Processo("MusNotification.exe", "C:\\WINDOWS\\system32\\MusNotification.exe"));
		this.listaDeProcessosAceitos.add(new Processo("mqsvc.exe", "C:\\WINDOWS\\system32\\mqsvc.exe"));
		this.listaDeProcessosAceitos.add(new Processo("audiodg.exe", "C:\\WINDOWS\\system32\\AUDIODG.EXE"));
		this.listaDeProcessosAceitos.add(new Processo("fontdrvhost.exe", "C:\\WINDOWS\\system32\\fontdrvhost.exe"));
		this.listaDeProcessosAceitos.add(new Processo("browser_broker.exe", "C:\\WINDOWS\\system32\\browser_broker.exe"));
		this.listaDeProcessosAceitos.add(new Processo("MusNotificationUx.exe", "C:\\WINDOWS\\system32\\MusNotificationUx.exe"));
		this.listaDeProcessosAceitos.add(new Processo("dasHost.exe", "C:\\WINDOWS\\system32\\dashost.exe"));
		this.listaDeProcessosAceitos.add(new Processo("wlanext.exe", "C:\\WINDOWS\\system32\\WLANExt.exe"));
		this.listaDeProcessosAceitos.add(new Processo("WWAHost.exe", "C:\\WINDOWS\\system32\\wwahost.exe"));
		this.listaDeProcessosAceitos.add(new Processo("SystemSettingsBroker.exe", "C:\\Windows\\System32\\SystemSettingsBroker.exe"));
		this.listaDeProcessosAceitos.add(new Processo("BackgroundTransferHost.exe", "C:\\WINDOWS\\system32\\BackgroundTransferHost.exe"));
		this.listaDeProcessosAceitos.add(new Processo("MicrosoftEdgeCP.exe", "C:\\Windows\\System32\\MicrosoftEdgeCP.exe"));
		this.listaDeProcessosAceitos.add(new Processo("SecurityHealthSystray.exe", "C:\\Windows\\System32\\SecurityHealthSystray.exe"));
		this.listaDeProcessosAceitos.add(new Processo("ctfmon.exe", "C:\\Windows\\system32\\ctfmon.exe"));
		this.listaDeProcessosAceitos.add(new Processo("HelpPane.exe", "C:\\Windows\\helppane.exe"));
		this.listaDeProcessosAceitos.add(new Processo("w.exe", "C:\\Windows\\System32\\W.exe"));
		this.listaDeProcessosAceitos.add(new Processo("Silverlight_x64.exe", "C:\\Windows\\SoftwareDistribution\\Download\\Install\\Silverlight_x64.exe"));
		this.listaDeProcessosAceitos.add(new Processo("reg.exe", "C:\\Windows\\SysWOW64\\REG.exe"));
		this.listaDeProcessosAceitos.add(new Processo("PrintIsolationHost.exe", "C:\\Windows\\system32\\PrintIsolationHost.exe"));
		this.listaDeProcessosAceitos.add(new Processo("csrss.exe", "C:\\Windows\\system32\\csrss.exe"));
		this.listaDeProcessosAceitos.add(new Processo("wininit.exe", "C:\\Windows\\system32\\wininit.exe"));
		this.listaDeProcessosAceitos.add(new Processo("services.exe", "C:\\Windows\\system32\\services.exe"));
		this.listaDeProcessosAceitos.add(new Processo("winlogon.exe", "C:\\Windows\\system32\\winlogon.exe"));
		this.listaDeProcessosAceitos.add(new Processo("lsass.exe", "C:\\Windows\\system32\\lsass.exe"));
		this.listaDeProcessosAceitos.add(new Processo("lsm.exe", "C:\\Windows\\system32\\lsm.exe"));
		this.listaDeProcessosAceitos.add(new Processo("svchost.exe", "C:\\Windows\\system32\\svchost.exe"));
		this.listaDeProcessosAceitos.add(new Processo("spoolsv.exe", "C:\\Windows\\System32\\spoolsv.exe"));
		this.listaDeProcessosAceitos.add(new Processo("IPROSetMonitor.exe", "C:\\Windows\\system32\\IProsetMonitor.exe"));
		this.listaDeProcessosAceitos.add(new Processo("WmiPrvSE.exe", "C:\\Windows\\system32\\wbem\\wmiprvse.exe"));
		this.listaDeProcessosAceitos.add(new Processo("taskhost.exe", "C:\\Windows\\system32\\taskhost.exe"));
		this.listaDeProcessosAceitos.add(new Processo("dwm.exe", "C:\\Windows\\system32\\Dwm.exe"));
		this.listaDeProcessosAceitos.add(new Processo("explorer.exe", "C:\\Windows\\Explorer.EXE"));
		this.listaDeProcessosAceitos.add(new Processo("SearchIndexer.exe", "C:\\Windows\\system32\\SearchIndexer.exe"));
		this.listaDeProcessosAceitos.add(new Processo("igfxtray.exe", "C:\\Windows\\System32\\igfxtray.exe"));
		this.listaDeProcessosAceitos.add(new Processo("hkcmd.exe", "C:\\Windows\\System32\\hkcmd.exe"));
		this.listaDeProcessosAceitos.add(new Processo("igfxpers.exe", "C:\\Windows\\System32\\igfxpers.exe"));
		this.listaDeProcessosAceitos.add(new Processo("conhost.exe", "C:\\Windows\\system32\\conhost.exe"));
		this.listaDeProcessosAceitos.add(new Processo("notepad.exe", "C:\\Windows\\system32\\notepad.exe"));
		this.listaDeProcessosAceitos.add(new Processo("mspaint.exe", "C:\\Windows\\system32\\mspaint.exe"));
		this.listaDeProcessosAceitos.add(new Processo("SearchProtocolHost.exe", "C:\\Windows\\system32\\SearchProtocolHost.exe"));
		this.listaDeProcessosAceitos.add(new Processo("SearchFilterHost.exe", "C:\\Windows\\system32\\SearchFilterHost.exe"));
		this.listaDeProcessosAceitos.add(new Processo("WMIC.exe", "C:\\Windows\\System32\\Wbem\\wmic.exe"));
		this.listaDeProcessosAceitos.add(new Processo("igfxsrvc.exe", "C:\\Windows\\system32\\igfxsrvc.exe"));
		this.listaDeProcessosAceitos.add(new Processo("taskeng.exe", "C:\\Windows\\system32\\taskeng.exe"));
		this.listaDeProcessosAceitos.add(new Processo("tasklist.exe", "C:\\Windows\\system32\\tasklist.exe"));
		this.listaDeProcessosAceitos.add(new Processo("WUDFHost.exe", "C:\\Windows\\System32\\WUDFHost.exe"));
		this.listaDeProcessosAceitos.add(new Processo("dllhost.exe", "C:\\Windows\\system32\\DllHost.exe"));
		this.listaDeProcessosAceitos.add(new Processo("sppsvc.exe", "C:\\Windows\\system32\\sppsvc.exe"));
		this.listaDeProcessosAceitos.add(new Processo("WMIC.exe", "C:\\Windows\\SysWOW64\\Wbem\\wmic.exe"));
		this.listaDeProcessosAceitos.add(new Processo("rundll32.exe", "C:\\Windows\\System32\\rundll32.exe"));
		this.listaDeProcessosAceitos.add(new Processo("explorer.exe", "C:\\Windows\\SysWOW64\\explorer.exe"));
		this.listaDeProcessosAceitos.add(new Processo("taskkill.exe", "C:\\Windows\\SysWOW64\\taskkill.exe"));
		this.listaDeProcessosAceitos.add(new Processo("igfxCUIService.exe", "C:\\Windows\\system32\\igfxCUIService.exe"));
		this.listaDeProcessosAceitos.add(new Processo("wisptis.exe", "C:\\Windows\\SYSTEM32\\WISPTIS.EXE"));
		this.listaDeProcessosAceitos.add(new Processo("dllhost.exe", "C:\\Windows\\SysWOW64\\DllHost.exe"));
		this.listaDeProcessosAceitos.add(new Processo("mmc.exe", "C:\\Windows\\system32\\mmc.exe"));
		this.listaDeProcessosAceitos.add(new Processo("wuauclt.exe", "C:\\Windows\\system32\\wuauclt.exe"));
		this.listaDeProcessosAceitos.add(new Processo("splwow64.exe", "C:\\Windows\\splwow64.exe"));
		this.listaDeProcessosAceitos.add(new Processo("unregmp2.exe", "C:\\Windows\\system32\\unregmp2.exe"));
		this.listaDeProcessosAceitos.add(new Processo("calc.exe", "C:\\Windows\\system32\\calc.exe"));
		this.listaDeProcessosAceitos.add(new Processo("StkCSrv.exe", "C:\\Windows\\System32\\StkCSrv.exe"));
		this.listaDeProcessosAceitos.add(new Processo("StikyNot.exe", "C:\\Windows\\system32\\StikyNot.exe"));
		this.listaDeProcessosAceitos.add(new Processo("consent.exe", "C:\\Windows\\system32\\consent.exe"));
		this.listaDeProcessosAceitos.add(new Processo("GfxUI.exe", "C:\\Windows\\System32\\GfxUI.exe"));
		this.listaDeProcessosAceitos.add(new Processo("igfxEM.exe", "C:\\Windows\\system32\\igfxEM.exe"));
		this.listaDeProcessosAceitos.add(new Processo("igfxHK.exe", "C:\\Windows\\system32\\igfxHK.exe"));
		this.listaDeProcessosAceitos.add(new Processo("igfxTray.exe", "C:\\Windows\\system32\\igfxTray.exe"));
		this.listaDeProcessosAceitos.add(new Processo("SndVol.exe", "C:\\Windows\\system32\\SndVol.exe"));
		this.listaDeProcessosAceitos.add(new Processo("cmd.exe", "C:\\Windows\\SysWOW64\\cmd.exe"));
		this.listaDeProcessosAceitos.add(new Processo("LogonUI.exe", "C:\\Windows\\system32\\LogonUI.exe"));
		this.listaDeProcessosAceitos.add(new Processo("VSSVC.exe", "C:\\Windows\\system32\\vssvc.exe"));
		this.listaDeProcessosAceitos.add(new Processo("mcbuilder.exe", "C:\\Windows\\system32\\mcbuilder.exe"));
		this.listaDeProcessosAceitos.add(new Processo("Defrag.exe", "C:\\Windows\\system32\\defrag.exe"));
		this.listaDeProcessosAceitos.add(new Processo("aitagent.exe", "C:\\Windows\\system32\\aitagent.EXE"));
		this.listaDeProcessosAceitos.add(new Processo("unregmp2.exe", "C:\\Windows\\SysWOW64\\unregmp2.exe"));
		this.listaDeProcessosAceitos.add(new Processo("WMIADAP.exe", "C:\\Windows\\system32\\wbem\\WMIADAP.EXE"));
		this.listaDeProcessosAceitos.add(new Processo("taskkill.exe", "C:\\Windows\\system32\\taskkill.exe"));
		this.listaDeProcessosAceitos.add(new Processo("WerFault.exe", "C:\\Windows\\SysWOW64\\WerFault.exe"));
		this.listaDeProcessosAceitos.add(new Processo("Dxpserver.exe", "C:\\Windows\\system32\\DXPServer.exe"));
		this.listaDeProcessosAceitos.add(new Processo("reg.exe", "C:\\Windows\\system32\\REG.exe"));
		this.listaDeProcessosAceitos.add(new Processo("msdtc.exe", "C:\\Windows\\System32\\msdtc.exe"));
		this.listaDeProcessosAceitos.add(new Processo("rundll32.exe", "C:\\Windows\\SysWOW64\\rundll32.exe"));
		this.listaDeProcessosAceitos.add(new Processo("net.exe", "C:\\Windows\\system32\\net.exe"));
		this.listaDeProcessosAceitos.add(new Processo("net1.exe", "C:\\Windows\\system32\\net1.exe"));
		this.listaDeProcessosAceitos.add(new Processo("dinotify.exe", "C:\\Windows\\System32\\dinotify.exe"));
		this.listaDeProcessosAceitos.add(new Processo("MpSigStub.exe", "C:\\Windows\\system32\\MpSigStub.exe"));
		this.listaDeProcessosAceitos.add(new Processo("sdclt.exe", "C:\\Windows\\System32\\sdclt.exe"));
		this.listaDeProcessosAceitos.add(new Processo("net.exe", "C:\\Windows\\SysWOW64\\net.exe"));
		this.listaDeProcessosAceitos.add(new Processo("WmiPrvSE.exe", "C:\\Windows\\sysWOW64\\wbem\\wmiprvse.exe"));
		this.listaDeProcessosAceitos.add(new Processo("cacls.exe", "C:\\Windows\\system32\\cacls.exe"));
		this.listaDeProcessosAceitos.add(new Processo("drvinst.exe", "C:\\Windows\\system32\\DrvInst.exe"));
		this.listaDeProcessosAceitos.add(new Processo("makecab.exe", "C:\\Windows\\system32\\makecab.exe"));
		this.listaDeProcessosAceitos.add(new Processo("attrib.exe", "C:\\Windows\\system32\\attrib.exe"));
		this.listaDeProcessosAceitos.add(new Processo("notepad.exe", "C:\\Windows\\SysWOW64\\notepad.exe"));
		this.listaDeProcessosAceitos.add(new Processo("unsecapp.exe", "C:\\Windows\\system32\\wbem\\unsecapp.exe"));
		this.listaDeProcessosAceitos.add(new Processo("wmdc.exe", "C:\\Windows\\WindowsMobile\\wmdc.exe"));
		this.listaDeProcessosAceitos.add(new Processo("cmd.exe", "C:\\Windows\\system32\\cmd.exe"));
		this.listaDeProcessosAceitos.add(new Processo("java.exe", "C:\\Windows\\system32\\java.exe"));
		this.listaDeProcessosAceitos.add(new Processo("FlashPlayerPlugin_16_0_0_305.exe","C:\\Windows\\SysWOW64\\Macromed\\Flash\\FlashPlayerPlugin_16_0_0_305.exe"));
		this.listaDeProcessosAceitos.add(new Processo("FlashUtil64_16_0_0_305_ActiveX.exe","C:\\Windows\\system32\\Macromed\\Flash\\FlashUtil64_16_0_0_305_ActiveX.exe"));
		this.listaDeProcessosAceitos.add(new Processo("octave-gui.exe", "C:\\Octave\\Octave-4.2.0\\bin\\octave-gui.exe"));
		this.listaDeProcessosAceitos.add(new Processo("FlashPlayerPlugin_17_0_0_188.exe","C:\\Windows\\SysWOW64\\Macromed\\Flash\\FlashPlayerPlugin_17_0_0_188.exe"));
		this.listaDeProcessosAceitos.add(new Processo("vstor_redist.exe","C:\\Windows\\SoftwareDistribution\\Download\\Install\\vstor_redist.exe"));
		this.listaDeProcessosAceitos.add(new Processo("WINWORDC.EXE", "Q:\\140066.ptb\\Office14\\WINWORDC.EXE"));
		this.listaDeProcessosAceitos.add(new Processo("EXCELC.EXE", "Q:\\140066.ptb\\Office14\\EXCELC.EXE"));
		this.listaDeProcessosAceitos.add(new Processo("oracle.exe", "c:\\oraclexe\\app\\oracle\\product\\11.2.0\\server\\bin\\ORACLE.EXE"));
		this.listaDeProcessosAceitos.add(new Processo("TNSLSNR.EXE", "C:\\oraclexe\\app\\oracle\\product\\11.2.0\\server\\BIN\\tnslsnr.exe"));
		this.listaDeProcessosAceitos.add(new Processo("python.exe", "C:\\Python27\\python.exe"));
		this.listaDeProcessosAceitos.add(new Processo("FlashUtil64_17_0_0_188_ActiveX.exe","C:\\Windows\\system32\\Macromed\\Flash\\FlashUtil64_17_0_0_188_ActiveX.exe"));
		this.listaDeProcessosAceitos.add(new Processo("DeviceDisplayObjectProvider.exe","C:\\Windows\\system32\\DeviceDisplayObjectProvider.exe"));
		this.listaDeProcessosAceitos.add(new Processo("Winx64CmapTools_v6.01_02-25-15.exe","\\\\LABTI36\\arquivos\\acleber\\Downloads\\Winx64CmapTools_v6.01_02-25-15.exe"));
		this.listaDeProcessosAceitos.add(new Processo("AM_Delta_Patch_1.201.2218.0.exe","C:\\Windows\\SoftwareDistribution\\Download\\Install\\AM_Delta_Patch_1.201.2218.0.exe"));
		this.listaDeProcessosAceitos.add(new Processo("AM_Delta_Patch_1.203.205.0.exe","C:\\Windows\\SoftwareDistribution\\Download\\Install\\AM_Delta_Patch_1.203.205.0.exe"));
		this.listaDeProcessosAceitos.add(new Processo("AM_Delta_Patch_1.201.2067.0.exe","C:\\Windows\\SoftwareDistribution\\Download\\Install\\AM_Delta_Patch_1.201.2067.0.exe"));
		this.listaDeProcessosAceitos.add(new Processo("AM_Delta_Patch_1.201.1937.0.exe","C:\\Windows\\SoftwareDistribution\\Download\\Install\\AM_Delta_Patch_1.201.1937.0.exe"));
		this.listaDeProcessosAceitos.add(new Processo("AM_Base_Patch1.exe","C:\\Windows\\SoftwareDistribution\\Download\\Install\\AM_Base_Patch1.exe"));
		this.listaDeProcessosAceitos.add(new Processo("AM_Delta.exe", "C:\\Windows\\SoftwareDistribution\\Download\\Install\\AM_Delta.exe"));
		this.listaDeProcessosAceitos.add(new Processo("CompatTelRunner.exe", "C:\\Windows\\system32\\CompatTelRunner.exe"));
		this.listaDeProcessosAceitos.add(new Processo("DFLocker.exe", "C:\\Windows\\TEMP\\DFLocker.exe"));
		this.listaDeProcessosAceitos.add(new Processo("diagtrackrunner.exe", "C:\\Windows\\system32\\compattel\\DiagTrackRunner.exe"));
		this.listaDeProcessosAceitos.add(new Processo("gpscript.exe", "C:\\Windows\\system32\\gpscript.exe"));
		this.listaDeProcessosAceitos.add(new Processo("GWXConfigManager.exe", "C:\\Windows\\system32\\GWX\\GWXConfigManager.exe"));
		this.listaDeProcessosAceitos.add(new Processo("GWX.exe", "C:\\Windows\\system32\\GWX\\GWX.exe"));
		this.listaDeProcessosAceitos.add(new Processo("mobsync.exe", "C:\\Windows\\System32\\mobsync.exe"));
		this.listaDeProcessosAceitos.add(new Processo("MPSigStub.exe", "c:\\59a0b9075bdf5a428ed9\\MpSigStub.exe"));
		this.listaDeProcessosAceitos.add(new Processo("OCS-NG-Windows-Agent-Setup.exe","\\\\net.unilab.edu.br\\SysVol\\net.unilab.edu.br\\Policies\\{2A4896A8-6128-47A7-A2DB-32577BE2EDA9}\\Machine\\Scripts\\Startup\\OCS-NG-Windows-Agent-Setup.exe"));
		this.listaDeProcessosAceitos.add(new Processo("sc.exe", "C:\\Windows\\system32\\sc.exe"));
		this.listaDeProcessosAceitos.add(new Processo("sdiagnhost.exe", "C:\\Windows\\System32\\sdiagnhost.exe"));
		this.listaDeProcessosAceitos.add(new Processo("wsqmcons.exe", "C:\\Windows\\System32\\wsqmcons.exe"));
		this.listaDeProcessosAceitos.add(new Processo("wermgr.exe", "C:\\Windows\\system32\\wermgr.exe"));
		this.listaDeProcessosAceitos.add(new Processo("wicainventory.exe", "C:\\Windows\\system32\\CompatTel\\WicaInventory.exe"));
		this.listaDeProcessosAceitos.add(new Processo("WatAdminSvc.exe", "C:\\Windows\\system32\\Wat\\WatAdminSvc.exe"));
		this.listaDeProcessosAceitos.add(new Processo("WerFault.exe", "C:\\Windows\\system32\\WerFault.exe"));
		this.listaDeProcessosAceitos.add(new Processo("UI0Detect.exe", "C:\\Windows\\system32\\UI0Detect.exe"));
		this.listaDeProcessosAceitos.add(new Processo("FlashPlayerPlugin_18_0_0_209.exe","C:\\Windows\\system32\\Macromed\\Flash\\FlashPlayerPlugin_18_0_0_209.exe"));		
		this.listaDeProcessosAceitos.add(new Processo("FlashPlayerUpdateService.exe","C:\\Windows\\system32\\Macromed\\Flash\\FlashPlayerUpdateService.exe"));
		this.listaDeProcessosAceitos.add(new Processo("FlashPlayerPlugin_13_0_0_214.exe","C:\\Windows\\SysWOW64\\Macromed\\Flash\\FlashPlayerPlugin_13_0_0_214.exe"));
		this.listaDeProcessosAceitos.add(new Processo("AM_Delta_Patch_1.203.1791.0.exe","C:\\Windows\\SoftwareDistribution\\Download\\Install\\AM_Delta_Patch_1.203.1791.0.exe"));
		this.listaDeProcessosAceitos.add(new Processo("javaw.exe", "C:\\Windows\\system32\\javaw.exe"));
		this.listaDeProcessosAceitos.add(new Processo("Name", "ExecutablePath"));
		this.listaDeProcessosAceitos.add(new Processo("taskmgr.exe", "C:\\Windows\\system32\\taskmgr.exe"));
		this.listaDeProcessosAceitos.add(new Processo("regedit.exe", "C:\\Windows\\regedit.exe"));
		this.listaDeProcessosAceitos.add(new Processo("AM_Delta_Patch_1.255.107.0.exe","C:\\Windows\\SoftwareDistribution\\Download\\Install\\AM_Delta_Patch_1.255.107.0.exe"));
		this.listaDeProcessosAceitos.add(new Processo("userinit.exe", "C:\\Windows\\system32\\userinit.exe"));
		this.listaDeProcessosAceitos.add(new Processo("FXSSVC.exe", "C:\\Windows\\system32\\fxssvc.exe"));
		this.listaDeProcessosAceitos.add(new Processo("gpupdate.exe", "C:\\Windows\\system32\\gpupdate.exe"));
		this.listaDeProcessosAceitos.add(new Processo("vds.exe", "C:\\WINDOWS\\System32\\vds.exe"));
		this.buscaDeArquivo();

	}

	/**
	 * Busca lista de processos aceitos a partir de um arquivo.
	 */
	public void buscaDeArquivo() {
		File arquivoVerifica = new File("permitidos.txt");
		if (!arquivoVerifica.exists()) {
			FileWriter fw;
			try {
				fw = new FileWriter(arquivoVerifica, true);
				BufferedWriter bw = new BufferedWriter(fw);
				bw.write(
						"[Cole aqui os processos do arquivo bloqueados.txt que deseja permitir. Um processo por linha. Não apague esta linha!] ");
				bw.newLine();
				bw.close();
				fw.close();
				return;
			} catch (IOException e) {
				e.printStackTrace();
			}

		}

		try {

			FileInputStream arquivo = new FileInputStream(arquivoVerifica);
			BufferedReader linhaArquivo = new BufferedReader(new InputStreamReader(arquivo));
			linhaArquivo.ready();
			while (linhaArquivo.ready()) {
				String linha = linhaArquivo.readLine();
				if (linha.isEmpty()) {
					continue;
				}

				if (linha.charAt(0) == '[') {
					continue;
				}

				boolean jaTem = false;
				String[] vDados = linha.split("[,]");

				for (Processo processoAceito : listaDeProcessosAceitos) {
					if (processoAceito.getExecutablePath().equals(vDados[0])
							&& processoAceito.getImagem().equals(vDados[1])) {
						jaTem = true;
						break;
					}
				}

				if (jaTem) {
					continue;
				}

				try {
					listaDeProcessosAceitos.add(new Processo(vDados[1], vDados[0]));
				} catch (ArrayIndexOutOfBoundsException fora) {
					System.out.println(linha);
				}
			}
			linhaArquivo.close();
		} catch (IOException e) {
			e.printStackTrace();
		}
	}

	/**
	 * Obter a lista de processos ativos no sistema operacional.
	 */
	public void buscaAtivos() {

		this.processosAtivos = new Vector<Processo>();
		Process process;
		Scanner leitor;

		try {

			process = Runtime.getRuntime().exec(" wmic process  get ProcessID, Name, ExecutablePath /FORMAT:CSV");
			leitor = new Scanner(process.getInputStream());

			while (leitor.hasNext()) {
				String linha = leitor.nextLine();
				if (linha.equals("")) {
					continue;
				}

				String[] vDados = linha.split("[,]");
				this.processosAtivos.add(new Processo(vDados[2], vDados[1], vDados[3]));

			}

		} catch (IOException e) {
			e.printStackTrace();
		}

	}

	/**
	 * Mata os processos ativos que não estiverem na lista dos permitidos. .
	 */
	public void comparaEMata() {

		boolean existeNaLista = false;
		Iterator<Processo> it = processosAtivos.iterator();// usando iterator para evitar erros de acessos simultâneos
		while (it.hasNext()) {
			Processo processoAtivo = it.next();
			existeNaLista = false;			
			
			if (processoAtivo.getExecutablePath().length() >= 46) {
				if (processoAtivo.getExecutablePath().substring(0, 46).toLowerCase().substring(0, 46).equals("c:\\windows\\system32\\driverstore\\filerepository")) {
					continue;
				}
			}
			
			if (processoAtivo.getExecutablePath().length() >= 17) {
				if (processoAtivo.getExecutablePath().substring(0, 17).toLowerCase().equals("C:\\Windows\\SERVIC")) {
					continue;
				}
			}			

			if (processoAtivo.getExecutablePath().length() >= 9) {
				if (processoAtivo.getExecutablePath().substring(0, 9).toLowerCase().equals("c:\\progra")) {
					continue;
				}
			}
			if (processoAtivo.getExecutablePath().length() >= 11) {
				if (processoAtivo.getExecutablePath().substring(0, 11).toLowerCase().equals("c:\\positivo")) {
					continue;
				}
			}
			if (processoAtivo.getExecutablePath().length() >= 18) {
				if (processoAtivo.getExecutablePath().substring(0, 18).toLowerCase().equals("c:\\windows\\winsxs\\")) {
					continue;
				}
			}
			
			if (processoAtivo.getExecutablePath().length() >= 24) {
				if (processoAtivo.getExecutablePath().substring(0, 24).toLowerCase().equals("c:\\windows\\microsoft.net")) {
					continue;
				}
			}
			for (Processo processoAceito : this.listaDeProcessosAceitos) {
				if (processoAtivo.equals(processoAceito)) {
					existeNaLista = true;
					break;

				}
			}
			if(existeNaLista) {
				
				continue;
			}

			try {
				Runtime.getRuntime().exec(" taskkill /PID \"" + processoAtivo.getProcessId() + "\" /F");
				System.out.println(processoAtivo.getExecutablePath()+" -> "+processoAtivo.getImagem());
				if (!this.existeNaLista(processoAtivo, this.listaDeBloqueados)) {
					this.listaDeBloqueados.add(processoAtivo);

				}
				new Log(processoAtivo.getExecutablePath() + "," + processoAtivo.getImagem(), "bloqueados.txt");

			} catch (Exception e) {
				e.printStackTrace();
			}
		

		}
	}

	/**
	 * Exibe os processos ativos.
	 */
	public void mostraProcessos() {
		for (Processo p : this.processosAtivos) {
			System.out.println(p);
		}
	}

	public void mostraBloqueados() {
		for (Processo p : this.listaDeBloqueados) {
			System.out.println(p);
		}
	}

	/**
	 * @param processo
	 * @param lista
	 * @return
	 */
	public boolean existeNaLista(Processo processo, Collection<Processo> lista) {
		for (Processo processo2 : lista) {
			if (processo.getExecutablePath().toLowerCase().trim()
					.equals(processo2.getExecutablePath().toLowerCase().trim())
					&& processo.getImagem().toLowerCase().trim().equals(processo2.getImagem().toLowerCase().trim())) {
				return true;
			}
		}
		return false;
	}
}
