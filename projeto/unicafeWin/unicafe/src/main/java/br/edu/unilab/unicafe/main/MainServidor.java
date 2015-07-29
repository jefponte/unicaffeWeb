package br.edu.unilab.unicafe.main;

import br.edu.unilab.unicafe.model.Servidor;

/**
 * 
 * @author Jefferson
 *
 */
public class MainServidor {
	public static void main(String[] args) {
		
		Servidor servidor = new Servidor();
		servidor.iniciaServico();
//
//		


		
		
		
		
//		//
//		//
//		 DAO daoSS = new DAO(DAO.TIPO_PG_PRODUCAO);
//		 
////		 DAO daoSIGAA = new DAO(DAO.TIPO_PG_SIGAA);
////		 DAO daoTeste= new DAO(DAO.TIPO_PG_TESTE);
//
//		 //O objetivo aqui é cadastrar as máquinas nos devidos laboratórios. 
//		 //Pegar máquina da 00 até a 36 
//		 
//		 
//		 // //A gente deleta os acessos.
//		// //A gente deleta os usuários.
//		// // A gente faz o backup do sigaa.
//		//
//		//
//		 try {
//		
//		 //
////		 daoTeste.getConexao().prepareStatement("DELETE FROM acesso").executeUpdate();
////		 //
////		 daoTeste.getConexao().prepareStatement("DELETE FROM usuario").executeUpdate();
////		 //
////		
//		 PreparedStatement ps  = daoSS.getConexao().prepareStatement("SELECT * FROM usuario INNER JOIN acesso ON usuario.id_usuario = acesso.id_usuario WHERE login like '%valdiralmada%' ORDER By id_acesso DESC");
//		//
//		 ResultSet result = ps.executeQuery();
//		 while(result.next()){
//		
//			 System.out.println("Hora Inicial o : "+result.getString("hora_inicial"));
//			 System.out.println("Tempo Usado : "+result.getString("tempo_usado"));
//				
//		
//		
//		
//		 }
//		 } catch (SQLException e) {
//		 // TODO Auto-generated catch block
//		 e.printStackTrace();
//		 }

	}
}
