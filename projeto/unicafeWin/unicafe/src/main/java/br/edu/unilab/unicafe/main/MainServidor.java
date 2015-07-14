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
//		 DAO daoSS = new DAO(DAO.TIPO_PG_SIMULACAO_SIGAA);
//		 DAO daoSIGAA = new DAO(DAO.TIPO_PG_SIGAA);
//		 DAO daoTeste= new DAO(DAO.TIPO_PG_TESTE);

		 //O objetivo aqui é cadastrar as máquinas nos devidos laboratórios. 
		 //Pegar máquina da 00 até a 36 
		 
		 
		 // //A gente deleta os acessos.
		// //A gente deleta os usuários.
		// // A gente faz o backup do sigaa.
		//
		//
		// try {
		//
		// //
		// daoTeste.getConexao().prepareStatement("DELETE FROM acesso").executeUpdate();
		// //
		// daoTeste.getConexao().prepareStatement("DELETE FROM usuario").executeUpdate();
		// //
		//
		// PreparedStatement ps =
		// daoSS.getConexao().prepareStatement("SELECT * FROM usuarios_unicafe");
		//
		// ResultSet result = ps.executeQuery();
		// while(result.next()){
		//
		// System.out.println("Inserir o : "+result.getString("nome"));
		// PreparedStatement psInserir =
		// daoTeste.getConexao().prepareStatement("INSERT into usuario(nome, email, login, senha, nivel_acesso, id_base_externa) VALUES(?, ?, ?, ?, 1, ?)");
		// psInserir.setString(1, result.getString("nome"));
		// psInserir.setString(2, result.getString("email"));
		// psInserir.setString(3, result.getString("login"));
		// psInserir.setString(4, result.getString("senha"));
		// psInserir.setInt(5, result.getInt("id_usuario"));
		// psInserir.executeUpdate();
		//
		//
		//
		// }
		// } catch (SQLException e) {
		// // TODO Auto-generated catch block
		// e.printStackTrace();
		// }

	}
}
