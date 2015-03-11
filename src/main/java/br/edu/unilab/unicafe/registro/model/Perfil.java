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
		Process process;
		for (Registro registro : listaDeRegistros) {
			try {

				process = Runtime.getRuntime().exec(registro.toString());

			} catch (IOException e) {
				
			}

		}
	}
	public void deletar() {
		Process process;
		for (Registro registro : listaDeRegistros) {
			try {

				process = Runtime.getRuntime().exec(registro.toString());

			} catch (IOException e) {
				
			}

		}
	}
	public void desfazer() {
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
	 * Retorna uma lista de bloqueios necessários em um bloqueio de tela. Ideal
	 * para ser chamado no início da aplicação.
	 * 
	 * @return
	 */
	public static ArrayList<Registro> listaParaBloqueio() {

		ArrayList<Registro> lista = new ArrayList<Registro>();

		lista.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\System",	"HideFastUserSwitching", Registro.REG_DWORD, "1", "0","Remove Opção para Trocar de Usuário no Ctrl+ALT+DEL"));
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\System",	"DisableTaskMgr", Registro.REG_DWORD, "1", "0",	"Remove Opção para Iniciar o Gerenciador de Tarefas no Ctrl+ALT+DEL"));
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer","NoLogOff", Registro.REG_DWORD, "1", "0","Remove Opção para Logoff no Ctrl+ALT+DEL"));
		lista.add(new Registro("HKCU\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\System",	"DisableLockWorkstation", Registro.REG_DWORD, "1", "0",	"Remove Opção para Bloquear este Computador no Ctrl+ALT+DEL"));
		lista.add(new Registro("HKCU\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\System",	"DisableChangePassword", Registro.REG_DWORD, "1", "0","Remove Opção para Desligar no Ctrl+ALT+DEL"));
		lista.add(new Registro("HKCU\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer","NoClose", Registro.REG_DWORD, "1", "0","Remove Opção de Desligar no Ctrl+Alt+del"));
		lista.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer","NoControlPanel", Registro.REG_DWORD, "1", "0",	"Desabilita Painel de Controle"));
		lista.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer","NoRun", Registro.REG_DWORD, "1", "0", "Não abrir o Executar"));
		lista.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\Programs","NoProgramsAndFeatures", Registro.REG_DWORD, "1", "0","Não exibir a lista no Add ou remover programas"));
		lista.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer","NoDrives", Registro.REG_DWORD, "0x00000c", "0", "Não pode abrir o disco C:"));
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer", "NoStartMenuMFUprogramsList", Registro.REG_DWORD, "1", "0", "Sem lista de programas no Menu Iniciar"));
		lista.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer", "NoClose", Registro.REG_DWORD, "1", "0", "Sem o Botão de Desligar no Menu Iniciar"));
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\System", "DisableTaskMgr", Registro.REG_DWORD, "1", "0","Desativar Gerenciador de Tarefas"));
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer", "NoPropertiesMyComputer", Registro.REG_DWORD, "1", "0","Não ver Propriedades do Meu Computador"));
		//lista.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Explorer\\User Shell Folders", "Common Desktop", Registro.REG_SZ, "\\\\DTI15\\DoMundo\\public", "%PUBLIC%\\Desktop","Muda a pasta da área de trabalho pública. "));
		//lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Explorer\\User Shell Folders", "Desktop", Registro.REG_EXPAND_SZ, "\\\\DTI15\\DoMundo\\desktop", "%USERPROFILE%\\Desktop","Muda a pasta da área de trabalho do usuário corrente. "));
		
		return lista;

	}

	/**
	 * Retorna uma lista de valores que para serem testados e documentados
	 * 
	 * 
	 * @return
	 */
	public static ArrayList<Registro> listaParaTeste() {

		ArrayList<Registro> lista = new ArrayList<Registro>();

		

		//Esses dois mudam a pasta da área de trabalho para o usuário. 
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\System", "DisableTaskMgr", Registro.REG_DWORD, "1", "0","Desativar Gerenciador de Tarefas"));
		
		
		//Fim do comentario. 
		
		return lista;

	}
}
