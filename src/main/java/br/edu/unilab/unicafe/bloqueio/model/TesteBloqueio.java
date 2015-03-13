package br.edu.unilab.unicafe.bloqueio.model;

import java.io.IOException;
import java.util.Scanner;

import br.edu.unilab.unicafe.bloqueio.dao.ProcessoDAO;
import br.edu.unilab.unicafe.registro.model.Registro;

public class TesteBloqueio {

	public static void main(String[] args) {


		PerfilBloqueio pb = new PerfilBloqueio();
		pb.buscaAceitos();
		//ProcessoDAO dao = new ProcessoDAO();
		//dao.cadastraLista(pb.getListaDeAceitos());
		pb.buscaAtivos();
		pb.comparaEMata();	
		/*
		for(Processo p : pb.getProcessosAtivos()){
			System.out.println(p);
		}
		*/
		/*
		while(true){
			
			try {
				Thread.sleep(3000);
			} catch (InterruptedException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
		
			pb.comparaEMata();	
			
		}
		*/

		
		//Registro r = new Registro("HKLM\\SOFTWARE\\Microsoft\\Windows\\CurrentVersion\\Policies\\Explorer","NoDrives", Registro.REG_DWORD, "0x00000c", "0", "N�o pode abrir o disco C:");
		
		//System.out.println(r.toStringDesfazer());
				
		
	}
}
