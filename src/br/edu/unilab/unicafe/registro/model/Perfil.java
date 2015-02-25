package br.edu.unilab.unicafe.registro.model;

import java.io.IOException;
import java.util.ArrayList;
import java.util.Scanner;

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
	


	public void executar(){
		Process process;
		for (Registro registro : listaDeRegistros) {
			try {

				process = Runtime.getRuntime().exec(registro.toString());
				
				/*
				 * System.out.println(registro);
				Scanner leitor = new Scanner(process.getInputStream());
				while (leitor.hasNextLine()) {
					System.out.println(leitor.nextLine());
				}
				*/
				
			} catch (IOException e) {
				System.out.println("Erro de IO Exception na classe Perfil, método executar. ");
			}
			
		}
	}
	public void desfazer(){
		Process process;
		for (Registro registro : listaDeRegistros) {
			try {

				process = Runtime.getRuntime().exec(registro.toStringDesfazer());
				/*
				System.out.println(registro.toStringDesfazer());
				Scanner leitor = new Scanner(process.getInputStream());
				
				while (leitor.hasNextLine()) {
					System.out.println(leitor.nextLine());
				}
				*/
				
			} catch (IOException e) {
				System.out.println("Erro de IO Exception na classe Perfil, método desfazer. ");
			}
			
		}
	}

	/**
	 * Retorna uma lista de bloqueios necessários em um bloqueio de tela. 
	 * Ideal para ser chamado no início da aplicação. 
	 * 
	 * @return
	 */
	public static ArrayList<Registro> listaParaBloqueio(){
		
		
		ArrayList<Registro> lista = new ArrayList<Registro>();
		
		lista.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\System",	 "HideFastUserSwitching", Registro.REG_DWORD, "1", "0", "Remove Opção para Trocar de Usuário no Ctrl+ALT+DEL"));
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\System",	 "DisableTaskMgr", Registro.REG_DWORD, "1", "0", "Remove Opção para Iniciar o Gerenciador de Tarefas no Ctrl+ALT+DEL"));
		lista.add(new Registro("HKCU\\Software\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer", "NoLogOff", Registro.REG_DWORD, "1", "0", "Remove Opção para Logoff no Ctrl+ALT+DEL"));
		lista.add(new Registro("HKCU\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\System", "DisableLockWorkstation", Registro.REG_DWORD, "1", "0", "Remove Opção para Bloquear este Computador no Ctrl+ALT+DEL"));
		lista.add(new Registro("HKCU\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\System", "DisableChangePassword", Registro.REG_DWORD, "1", "0", "Remove Opção para Desligar no Ctrl+ALT+DEL"));
		lista.add(new Registro("HKCU\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer", "NoClose", Registro.REG_DWORD, "1", "0", "Remove Opção de Desligar no Ctrl+Alt+del"));

		
		//Sem painel de controle. 
		lista.add(new Registro("HKCU\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer", "NoControlPanel", Registro.REG_DWORD, "1", "0", "Desativar Painel de Controle. "));
		lista.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer", "NoControlPanel", Registro.REG_DWORD, "1", "0", "Desativar Painel de Controle. "));
		
	
		//HKLM\SOFTWARE\Microsoft\Windows\CurrentVersion\Policies\Programs\NoDefaultPrograms: 0x00000001
		return lista;
		
		
		
		
	}
	/**
	 * Retorna uma lista de valores que para serem testados e documentados 
	 * 
	 * 
	 * @return
	 */
	public static ArrayList<Registro> listaParaTeste(){
		
		
		ArrayList<Registro> lista = new ArrayList<Registro>();

		lista.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Explorer\\Shell Folders", "Common Desktop", Registro.REG_EXPAND_SZ, "\\\\DTI43\\output", "C:\\Users\\Public\\Desktop", "Não0 sei ainda"));
		//lista.add(new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer", "NoControlPanel", Registro.REG_DWORD, "1", "0", "Não0 sei ainda"));
		
		
		return lista;
		
		
	}
}
