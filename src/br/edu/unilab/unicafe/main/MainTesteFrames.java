package br.edu.unilab.unicafe.main;



import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;

import br.edu.unilab.unicafe.dao.DAO;

public class MainTesteFrames {

	public static void main(String[] args) {
		// Vamos baixar a lista de usuários do SIG Para o SQLITE, doida

		DAO daoSqlite = new DAO(DAO.TIPO_SQLITE);
		DAO daoPostgresql = new DAO(DAO.TIPO_POSTGRESQL);

		try {

			PreparedStatement ps = daoPostgresql.getConexao().prepareStatement("SELECT * FROM usuario INNER JOIN pessoa ON usuario.id_pessoa_pessoa = pessoa.id_pessoa");
			ResultSet rs = ps.executeQuery();
			int i = 0;
			while(rs.next()){
				i++;
				System.out.println("Vou cadastrar "+i+"\n"+rs.getString("nome_pessoa"));
				PreparedStatement ps2 = daoSqlite.getConexao().prepareStatement("INSERT INTO usuario(nome, email, login, senha, cpf, nivel_acesso) VALUES (?, ?, ?, ?, ?, ?)");
				ps2.setString(1, rs.getString("nome_pessoa"));
				ps2.setString(2, rs.getString("email"));
				ps2.setString(3, rs.getString("login"));
				ps2.setString(4, rs.getString("senha"));
				ps2.setString(5, rs.getString("cpf"));
				ps2.setInt(6, 1);
				ps2.executeUpdate();
				
			}
			
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

	}

}
