package br.edu.unilab.unicafe.dao;

import java.sql.Connection;
import java.sql.Date;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Locale;

import br.edu.unilab.unicafe.model.Acesso;
import br.edu.unilab.unicafe.model.Maquina;
import br.edu.unilab.unicafe.model.Usuario;

public class AcessoDAO extends DAO{
	
	public static final int COTA = 3600;
	
	public AcessoDAO(){
		super();
	}
	public AcessoDAO(Connection conexao){
		super(conexao);
	}
	public AcessoDAO(int tipoDeConexao){
		super(tipoDeConexao);
		
	}
	/**
	 * Retorna toda a lista de acssos. 
	 * @return
	 */
	public ArrayList<Acesso> retornaLista(){

		ArrayList<Acesso> lista = new ArrayList<Acesso>();
		
		PreparedStatement ps;
		try {
			ps = this.getConexao().prepareStatement("SELECT * FROM acesso");
			//ps.setInt(1, usuario.getId());
			ResultSet resultSet = ps.executeQuery();
			while(resultSet.next()){
				Acesso acesso = new Acesso();
				acesso.setTempoUsado(resultSet.getInt("tempo_usado"));
				acesso.setTempoDisponibilizado(resultSet.getInt("tempo_oferecido"));
				Maquina maquina = new Maquina();
				maquina.setId(resultSet.getInt("id_maquina"));
				
				String input = resultSet.getString("hora_acesso");
				java.util.Date date;
				try {
					date = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss", Locale.ENGLISH).parse(input);
					acesso.setHoraInicial(date.getTime());
				} catch (ParseException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
				
				
				
				acesso.setMaquina(maquina);
				Usuario usuario = new Usuario();
				usuario.setId(resultSet.getInt("id_usuario"));
				acesso.setUsuario(usuario);
				
				lista.add(acesso);
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		
		
		return lista;
		
	}
	/**
	 * Retorna todos os acessos de um usuário. 
	 * @param usuario
	 * @return
	 */
	public ArrayList<Acesso> retornaLista(Usuario usuario){
		
		
		ArrayList<Acesso> lista = new ArrayList<Acesso>();
		
		PreparedStatement ps;
		try {
			ps = this.getConexao().prepareStatement("SELECT * FROM acesso WHERE id_usuario = ?");
			ps.setInt(1, usuario.getId());
			ResultSet resultSet = ps.executeQuery();
			while(resultSet.next()){
				Acesso acesso = new Acesso();
				acesso.setTempoUsado(resultSet.getInt("tempo_usado"));
				lista.add(acesso);
			}
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		
		
		
		return lista;
		
	}

	public int retornaTempoUsado(Usuario usuario){
		int tempo = 0;
		for(Acesso acesso : this.retornaLista(usuario)){
			tempo += acesso.getTempoUsado();
		}
		return tempo;
	}
	
	
	/**
	 * Retorna true se a máquina for cadastrada com sucesso. 
	 * @param maquina
	 * @return
	 */

	public boolean cadastra(Acesso acesso){
		try {

			PreparedStatement ps2 = this.getConexao().prepareStatement("INSERT into acesso(id_usuario, tempo_usado, hora_acesso, id_maquina, tempo_oferecido) VALUES(?, ?, ?, ?, ?)");			
			ps2.setInt(1, acesso.getUsuario().getId());
			ps2.setInt(2, acesso.getTempoUsado());
			Date data = new Date(System.currentTimeMillis());    
			SimpleDateFormat formatarDate = new SimpleDateFormat("yyyy-MM-dd HH:mm:ss");   
			String strData = formatarDate.format(data);  
			ps2.setString(3, strData);
			ps2.setInt(4, acesso.getMaquina().getId());
			ps2.setInt(5, acesso.getTempoDisponibilizado());
			ps2.executeUpdate();
			return true;					
			
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			return false;
		}		
	}

	/**
	 * Esse método pega um acesso padrão do sistema e envia pra tabela do banco do felipe. 
	 * O banco de dados que tá lá no PC do felipe. 
	 * 
	 * @param acesso
	 */
	public void cadastraTabelaFelipe(Acesso acesso){
		try{
			DAO dao = new DAO(DAO.TIPO_POSTGRESQL);
			
			System.out.println(acesso.toString());
			
			
		}catch(Exception e){
			
		}
		
		
	}
	
	
	public void renovaGalera(){
		
		PreparedStatement ps2;
		try {
			
			for(Acesso acesso: retornaLista()){
				cadastraTabelaFelipe(acesso);
				
			}
			
			ps2 = this.getConexao().prepareStatement("DELETE FROM acesso");
			ps2.executeUpdate();
			System.out.println("Galera foi renovada. ");
		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}			
		
		
		
		
	}
	
}
