package br.edu.unilab.unicafe.main;

import java.util.Scanner;

import br.edu.unilab.unicafe.dao.DAO;
import br.edu.unilab.unicafe.dao.UsuarioDAO;
import br.edu.unilab.unicafe.model.Usuario;

public class MainTeste {

	public static void main(String[] args) {
		Scanner entrada = new Scanner(System.in);
		int idBaseExterna;
		
		while(true){

			System.out.println("Digite o id do Individuo: ");
			idBaseExterna = entrada.nextInt();
			Usuario usuario = new Usuario();
			usuario.setIdBaseExterna(idBaseExterna);
			
			UsuarioDAO daoGraduacao = new UsuarioDAO(DAO.TIPO_PG_SIGAA2);
			if(daoGraduacao.seuNivelEhGraduacao(usuario)){
				System.out.println("Deu verdade");
				
			}
			else{
				System.out.println("Deu mentira");
			}	
		}
	}

}
