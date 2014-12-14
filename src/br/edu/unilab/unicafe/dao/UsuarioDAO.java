package br.edu.unilab.unicafe.dao;

import java.math.BigInteger;
import java.security.MessageDigest;
import java.security.NoSuchAlgorithmException;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;

import br.edu.unilab.unicafe.model.Usuario;

public class UsuarioDAO extends DAO {

	public UsuarioDAO(){
		super();
	}
	public UsuarioDAO(int tipoDeConexao){
		super(tipoDeConexao);
		
	}
	public boolean autentica(Usuario usuario){
		try {
			PreparedStatement ps = this.getConexao().prepareStatement("SELECT * FROM usuario WHERE login = ? AND senha = ?");
			ps.setString(1, usuario.getLogin());
			ps.setString(2, usuario.getSenha());
			ResultSet rs = ps.executeQuery();
			while(rs.next())
				return true;
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			return false;
		}
		
		
		return false;
	}
	/**
	 * Ele vai retornar verdadeiro caso o cadastro tenha dado certo e falso se o cadastro tiver dado errado. 
	 * O cadastro pode dar errado pelos seguintes motivos: 
	 * 1. O login não pode ser nenhum já cadastrado no banco. 
	 * 2. O email também não pode se repetir. 
	 * 3. Pode ter dado um erro de SQLException. 
	 * @param usuario
	 * @return
	 */
	public boolean cadastra(Usuario usuario){
		try {
			PreparedStatement ps = this.getConexao().prepareStatement("SELECT * FROM usuario WHERE login = ? OR email = ?");
			ps.setString(1, usuario.getLogin());
			ps.setString(2, usuario.getEmail());
			ResultSet rs = ps.executeQuery();
			while(rs.next())
				return false;
			PreparedStatement ps2 = this.getConexao().prepareStatement("INSERT into usuario(nome, email, login, senha, nivel_acesso, cpf) VALUES(?, ?, ?, ?, 1, ?)");
			
			ps2.setString(1, usuario.getNome());
			ps2.setString(2, usuario.getEmail());
			ps2.setString(3, usuario.getLogin());
			
			
			MessageDigest m;
			try {
				m = MessageDigest.getInstance("MD5");
				m.update(usuario.getSenha().getBytes(),0,usuario.getSenha().length());
				usuario.setSenha(new BigInteger(1,m.digest()).toString(16));
			} catch (NoSuchAlgorithmException e) {
				e.printStackTrace();
				return false;
			}				
			ps2.setString(4, usuario.getSenha());
			ps2.setString(5, usuario.getCpf());
			ps2.executeUpdate();
			return true;
					
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			return false;
		}		
	}

	public ArrayList<Usuario> retornaLista() throws SQLException{
	
		ArrayList<Usuario> lista = new ArrayList<Usuario>();
		PreparedStatement ps = this.getConexao().prepareStatement("SELECT * FROM usuario");
		ResultSet resultSet = ps.executeQuery();
		while(resultSet.next()){
			Usuario usuario = new Usuario();
			usuario.setNome(resultSet.getString("nome"));
			usuario.setLogin(resultSet.getString("login"));
			usuario.setEmail(resultSet.getString("email"));
			usuario.setId(resultSet.getInt("id_usuario"));
			usuario.setCpf(resultSet.getString("cpf"));
			usuario.setSenha(resultSet.getString("senha"));
			usuario.setNivelAcesso(resultSet.getInt("nivel_acesso"));
			lista.add(usuario);

			
		}
		return lista;
	}
	
}
