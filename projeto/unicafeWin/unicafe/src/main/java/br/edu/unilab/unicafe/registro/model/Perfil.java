package br.edu.unilab.unicafe.registro.model;


import java.io.IOException;
import java.util.ArrayList;

public class Perfil {
	private int id;
	private ArrayList<Registro> listaDeRegistros;



	private String nome;
	private String descricao;

	public int getId() {
		return id;
	}

	public void setId(int id) {
		this.id = id;
	}

	public ArrayList<Registro> getListaDeRegistros() {
		return listaDeRegistros;
	}

	public void setListaDeRegistros(ArrayList<Registro> listaDeRegistros) {
		this.listaDeRegistros = listaDeRegistros;
	}

	public String getNome() {
		return nome;
	}

	public void setNome(String nome) {
		this.nome = nome;
	}

	public String getDescricao() {
		return descricao;
	}

	public void setDescricao(String descricao) {
		this.descricao = descricao;
	}

	public void executar() {
		for (Registro registro : listaDeRegistros) {
			try {

				@SuppressWarnings("unused")
				Process process = Runtime.getRuntime().exec(registro.toString());

			} catch (IOException e) {
				
			}

		}
	}
	public void deletar() {
		@SuppressWarnings("unused")
		Process process;
		for (Registro registro : listaDeRegistros) {
			try {

				process = Runtime.getRuntime().exec(registro.toStringDeletar());

			} catch (IOException e) {
				
			}

		}
	}
	public void desfazer() {
		@SuppressWarnings("unused")
		Process process;
		for (Registro registro : listaDeRegistros) {
			try {

				process = Runtime.getRuntime()
						.exec(registro.toStringDesfazer());
				
			} catch (IOException e) {

			}

		}
	}

	/**
	 * Retorna uma lista de bloqueios necess�rios em um bloqueio de tela. Ideal
	 * para ser chamado no in�cio da aplica��o.
	 * 
	 * @return
	 */
	public static ArrayList<Registro> listaParaBloqueio() {

		ArrayList<Registro> lista = new ArrayList<Registro>();
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\System", "Wallpaper", Registro.REG_SZ, "C:\\Windows\\Web\\Wallpaper\\Windows\\papel-de-parede.jpg", "C:\\Windows\\Web\\Wallpaper\\Windows\\img0.jpg" ,"definir papel de parede"));
		lista.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer","NoControlPanel", Registro.REG_DWORD, "1", "0",	"Desabilita Painel de Controle"));
		lista.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer","NoRun", Registro.REG_DWORD, "1", "0", "Não abrir o Executar"));
		lista.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\Programs","NoProgramsAndFeatures", Registro.REG_DWORD, "1", "0","Não exibir a lista no Add ou remover programas"));
		
//		lista.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer", "NoViewOnDrive", Registro.REG_DWORD, "0x0000000C", "0x00000000","Não acessaar disco local C"));
		lista.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer","NoDrives", Registro.REG_DWORD, "0x00000c", "0", "Não pode ver o disco C:"));
		
		
		lista.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\System",	"HideFastUserSwitching", Registro.REG_DWORD, "1", "0","Remove Opção para Trocar de Usuário no Ctrl+ALT+DEL"));
		lista.add(new Registro("HKLM\\SOFTWARE\\Policies\\Microsoft\\Int ernet Explorer\\Restrictions", "NoFavorites", Registro.REG_DWORD, "1", "0","Não ver Propriedades do Meu Computador"));
		
		lista.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer", "NoClose", Registro.REG_DWORD, "1", "0","Não mostrar impressoras"));
		
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\System",	"DisableTaskMgr", Registro.REG_DWORD, "1", "0",	"Remove Op��o para Iniciar o Gerenciador de Tarefas no Ctrl+ALT+DEL"));
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer","NoLogOff", Registro.REG_DWORD, "1", "0","Remove Opção para Logoff no Ctrl+ALT+DEL"));
		lista.add(new Registro("HKCU\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\System",	"DisableLockWorkstation", Registro.REG_DWORD, "1", "0",	"Remove Opção para Bloquear este Computador no Ctrl+ALT+DEL"));
		lista.add(new Registro("HKCU\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\System",	"DisableChangePassword", Registro.REG_DWORD, "1", "0","Remove Opção para Desligar no Ctrl+ALT+DEL"));
		lista.add(new Registro("HKCU\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer","NoClose", Registro.REG_DWORD, "1", "0","Remove Opção de Desligar no Ctrl+Alt+del"));
		//lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer", "NoStartMenuMFUprogramsList", Registro.REG_DWORD, "1", "0", "Sem lista de programas no Menu Iniciar"));
//		lista.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer", "NoClose", Registro.REG_DWORD, "1", "0", "Sem o Botão de Desligar no Menu Iniciar"));
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\System", "DisableTaskMgr", Registro.REG_DWORD, "1", "0","Desativar Gerenciador de Tarefas"));
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer", "NoPropertiesMyComputer", Registro.REG_DWORD, "1", "0","Não ver Propriedades do Meu Computador"));
		
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer", "NoFolderOptions", Registro.REG_DWORD, "1", "0","Remove Opções de Pastas"));

		lista.add(new Registro("HKCU\\Software\\Policies\\Microsoft\\Windows\\System", "DisableCMD", Registro.REG_DWORD, "1", "0","Desativar prompt"));
		lista.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\WindowsUpdate\\Auto Update", "AUOptions", Registro.REG_DWORD, "1", "4","Desativar Opções Update"));
		lista.add(new Registro("HKLM\\SOFTWARE\\Policies\\Microsoft\\Windows\\WindowsUpdate\\AU", "NoAutoUpdate", Registro.REG_DWORD, "1", "0","Desativar Update"));
		
//		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\System", "WallpaperStyle", Registro.REG_DWORD, "2", "0","impede a alteração do plano de fundo"));
//		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\ActiveDesktop", "NoChangingWallpaper", Registro.REG_DWORD, "1", "0", "Não altera plano de fundo"));
		
		lista.add(new Registro("HKCU\\Software\\Classes\\Local Settings\\Software\\Microsoft\\Windows\\CurrentVersion\\TrayNotify", "PastIconsStream", Registro.REG_DWORD, "0", "0","Mostra os icones na area de notificação"));
		lista.add(new Registro("HKCU\\Software\\Classes\\Local Settings\\Software\\Microsoft\\Windows\\CurrentVersion\\TrayNotify", "IconStreams", Registro.REG_DWORD, "0", "0","Mostra os icones na area de notificação"));
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Explorer", "EnableAutoTray", Registro.REG_DWORD, "0", "0","Mostra os icones na area de notificação"));
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer", "NoTrayItemsDisplay", Registro.REG_DWORD, "0", "0","Mostra os icones na area de notificação"));
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Explorer\\Advanced", "Hidden", Registro.REG_DWORD, "0", "0","Ocultar arquivos de sistema"));
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Explorer\\Advanced", "ShowSuperHidden", Registro.REG_DWORD, "0", "0","Ocultar arquivos de sistema protegido"));
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Explorer\\Advanced", "HideFileExt", Registro.REG_DWORD, "1", "1","Ocultar extensões"));

		
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer", "DisallowRun", Registro.REG_DWORD, "1", "0","Bloqueio de Programas"));
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer\\DisallowRun", "1", Registro.REG_SZ, "PCFasterSvc.exe", "","Baidu"));
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer\\DisallowRun", "2", Registro.REG_SZ, "BavSvc.exe", "","Baidu"));
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer\\DisallowRun", "3", Registro.REG_SZ, "BHipsSvc.exe", "","Baidu"));
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer\\DisallowRun", "4", Registro.REG_SZ, "bavhm.exe", "","Baidu"));
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer\\DisallowRun", "5", Registro.REG_SZ, "Updater.exe", "","Baidu"));
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer\\DisallowRun", "6", Registro.REG_SZ, "Bav.exe", "","Baidu"));
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer\\DisallowRun", "7", Registro.REG_SZ, "PCFTray.exe", "","Baidu"));
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer\\DisallowRun", "8", Registro.REG_SZ, "PCFasterSvc.exe", "","Baidu"));
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer\\DisallowRun", "9", Registro.REG_SZ, "cmd.exe", "","cmd"));
		
		lista.add(new Registro("HKCU\\Control Panel\\Desktop", "SCRNSAVE.EXE", Registro.REG_SZ, "C:\\projetos\\unicafe\\projeto\\unicafeWin\\unicafe\\src\\main\\resources\\images\\UniCafe.scr", "C:\\Windows\\system32\\PhotoScreensaver.scr","Local da proteção de tela"));
		lista.add(new Registro("HKCU\\Control Panel\\Desktop", "ScreenSaveTimeOut", Registro.REG_SZ, "60", "60","Determina o tempo"));
		lista.add(new Registro("HKCU\\Control Panel\\Desktop", "ScreenSaveActive", Registro.REG_SZ, "1", "0","Ativa proteção de tela"));
		
		//lista.add(new Registro("HKLM\\SOFTWARE\\Classes\\Wow6432Node\\CLSID\\{323CA680-C24D-4099-B94D-446DD2D7249E}", "ShellFolder", Registro.REG_DWORD, "a9400100", "a0900100","N�o ver Propriedades do Meu Computador"));
		lista.add(new Registro("HKLM\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer", "StartMenuLogoff", Registro.REG_DWORD, "1", "0","Ativa proteção de tela"));

		lista.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\System", "ConsentPromptBehaviorAdmin", Registro.REG_DWORD, "00", "00","Não perguntar se pode abrir coisas como admin"));

	
		
		
		
		lista.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows NT\\CurrentVersion\\Winlogon", "DefaultUserName", Registro.REG_SZ, ".\\unicafe", ".\\unicafe","Login default de usuario do SO"));
		lista.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows NT\\CurrentVersion\\Winlogon", "DefaultPassword", Registro.REG_SZ, "unicafe@unilab", "unicafe@unilab","Senha padrão do usuario do UniCafe no SO"));
		lista.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows NT\\CurrentVersion\\Winlogon", "AutoAdminLogon", Registro.REG_DWORD, "01", "01","Não perguntar se pode abrir coisas como admin"));

	
		
		
		return lista;

	}
	
	/**
	 * São registros que são adicionados no sistema quando o UniCafe está em execução, mas que são deletados na desativação do UNICAFE
	 * São deletados quando o UniCafe Desativa. 
	 * @return
	 */
	public static ArrayList<Registro> perfilTemporarioExecucao(){
		
		ArrayList<Registro> temporario = new ArrayList<Registro>();
		
		
		temporario.add(new Registro("HKU\\S-1-5-21-450030969-3659189506-2535807683-1000\\Software\\Microsoft\\Windows\\CurrentVersion\\Group Policy Objects\\{716A25C0-6B71-4F49-9187-11CA3F39AF5C}User\\Software\\Policies\\Microsoft\\Windows\\Explorer", "PowerButtonAction", Registro.REG_DWORD, "512", "" ,"muda opcao de logof do menu iniciar pra bloquear"));

		temporario.add(new Registro("HKU\\S-1-5-21-450030969-3659189506-2535807683-1000\\Software\\Policies\\Microsoft\\Windows\\Explorer", "PowerButtonAction", Registro.REG_DWORD, "512", "" ,"muda opcao de logof do menu iniciar pra bloquear"));

		
		return temporario;
	}

	/**
	 * São registros que são adicionados no sistema quando o UniCafe está em sendo desativado. Faz com que a máquina volte às configurações padrão. 
	 * Esses registros são deletados quando o UniCafe liga. 
	 * @return
	 */
	public static ArrayList<Registro> perfilTemporarioDesativado(){
		
		ArrayList<Registro> temporario = new ArrayList<Registro>();
		
		temporario.add(new Registro("HKU\\S-1-5-21-450030969-3659189506-2535807683-1000\\Software\\Microsoft\\Windows\\CurrentVersion\\Group Policy Objects\\{716A25C0-6B71-4F49-9187-11CA3F39AF5C}User\\Software\\Policies\\Microsoft\\Windows\\Explorer", "**del.PowerButtonAction", Registro.REG_EXPAND_SZ, " ", "" ,"Deixar botão de logof no menu iniciar do jeito padrão"));

		return temporario;
	}

	
	/**
	 * Retorna uma lista de valores que para serem testados e documentados
	 * 
	 * 
	 * @return
	 */
	public static ArrayList<Registro> listaParaTeste() {

		ArrayList<Registro> lista = new ArrayList<Registro>();

		

		//Esses dois mudam a pasta da �rea de trabalho para o usu�rio. 
		lista.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer", "NoLogoff", Registro.REG_DWORD, "1", "0","Não mostrar impressoras"));
	
		
		
		//Fim do comentario. 
		
		return lista;

	}
}
