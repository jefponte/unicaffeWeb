package br.edu.unilab.unicafe.main;

import br.edu.unilab.unicafe.model.Servidor;

/**
 * 
 * @author Jefferson
 *
 */
public class MainServidor {
	public static void main(String[] args) {
//
		Servidor servidor = new Servidor();
		servidor.iniciaServico();

		
		
		
		
//		
//		
//		System.out.println("Backup dos dados do SIGAA. ");
//		
//		//Antes vamos Pegar os dados do SIGAA e por no nosso SQLITE. 
//		DAO daoSQLite = new DAO(DAO.TIPO_PG_SIMULACAO_SIGAA);
//		DAO daoSigaa = new DAO(DAO.TIPO_SQLITE);
//		
//		PreparedStatement ps;
//		try {
//			ps = daoSigaa.getConexao().prepareStatement("SELECT * FROM usuario_sig");
//			ResultSet resultSet = ps.executeQuery();
//			while(resultSet.next()){
//
//				String nome, email, login, senha, ramal;
//				int id, status, idFoto;
//				
//				id = resultSet.getInt("id_usuario");
//				nome = resultSet.getString("nome");
//				email = resultSet.getString("email");
//				login =  resultSet.getString("login");
//				senha = resultSet.getString("senha");
//				ramal = resultSet.getString("ramal");
//				idFoto = resultSet.getInt("id_foto");
//				status = resultSet.getInt("status");
//				System.out.println("Vamos guardar o "+nome+"no sqlite");
//				PreparedStatement psInsere = daoSQLite.getConexao().prepareStatement("INSERT into usuario_sig(id_usuario, nome, email, login, senha, ramal, id_foto, status) VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
//				psInsere.setInt(1, id);
//				psInsere.setString(2, nome);
//				psInsere.setString(3, email);
//				psInsere.setString(4, login);
//				psInsere.setString(5, senha);
//				psInsere.setString(6, ramal);
//				psInsere.setInt(7, idFoto);
//				psInsere.setInt(8, status);
//				
//				psInsere.executeUpdate();
//				
//				System.out.println("OK, proximo. ");
//				
//				
//				
//
//			}
//			daoSigaa.getConexao().close();
//			daoSQLite.getConexao().close();
//			
//		} catch (SQLException e) {
//			// TODO Auto-generated catch block
//			e.printStackTrace();
//		}
//		
//	System.out.println("Teste de view do Banco de dados do Cicero");
//		
//		DAO dao = new DAO(DAO.TIPO_PG_SIMULACAO_SIGAA);
//		PreparedStatement ps;
//		try {
//			
//			//SELECT column_name FROM information_schema.columns WHERE table_name ='table_name';
//			ps = dao.getConexao().prepareStatement("SELECT column_name FROM information_schema.columns WHERE table_name =?");
//			ps.setString(1, "usuarios_unicafe");
//			ResultSet resultSet = ps.executeQuery();
//			while(resultSet.next()){
//
//				System.out.println(resultSet.getString("column_name"));
//				
//
//			}
//			
//		} catch (SQLException e) {
//			// TODO Auto-generated catch block
//			e.printStackTrace();
//		}
//		
		
		
//		System.out.println("Teste de view do Banco de dados do Cicero");
//		
//		DAO dao = new DAO(DAO.TIPO_SQLITE);
//		PreparedStatement ps;
//		try {
//			ps = dao.getConexao().prepareStatement("SELECT * FROM usuarios_unicafe");
//			ResultSet resultSet = ps.executeQuery();
//			while(resultSet.next()){
//
//				System.out.println(resultSet.getString("nome"));
//				
//
//			}
//			
//		} catch (SQLException e) {
//			// TODO Auto-generated catch block
//			e.printStackTrace();
//		}
//		
		
		
		
		

	}
}
