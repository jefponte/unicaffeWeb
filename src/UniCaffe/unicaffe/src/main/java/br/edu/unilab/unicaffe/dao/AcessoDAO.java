package br.edu.unilab.unicaffe.dao;

import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Timestamp;
import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.ArrayList;
import java.util.Calendar;
import java.util.GregorianCalendar;

import br.edu.unilab.unicaffe.model.Acesso;
import br.edu.unilab.unicaffe.model.Maquina;
import br.edu.unilab.unicaffe.model.Usuario;

public class AcessoDAO extends DAO {

	public static final int COTA = 3600;

	public AcessoDAO() {
		super();
	}

	public AcessoDAO(Connection conexao) {
		super(conexao);
	}

	public AcessoDAO(int tipoDeConexao) {
		super(tipoDeConexao);

	}

	/**
	 * Retorna toda a lista de acssos.
	 * 
	 * @return
	 */
	public ArrayList<Acesso> retornaLista() {

		ArrayList<Acesso> lista = new ArrayList<Acesso>();

		PreparedStatement ps;
		try {
			ps = this
					.getConexao()
					.prepareStatement(
							"SELECT acesso.ip, usuario.login,  acesso.id_maquina, acesso.id_usuario, maquina.nome_pc, acesso.hora_inicial, acesso.tempo_usado, acesso.tempo_oferecido FROM acesso INNER JOIN usuario ON acesso.id_usuario = usuario.id_usuario INNER JOIN maquina ON acesso.id_maquina = maquina.id_maquina;");
			// ps.setInt(1, usuario.getId());
			ResultSet resultSet = ps.executeQuery();
			while (resultSet.next()) {
				Acesso acesso = new Acesso();
				acesso.setTempoUsado(resultSet.getInt("tempo_usado"));
				acesso.setTempoDisponibilizado(resultSet
						.getInt("tempo_oferecido"));
				Maquina maquina = new Maquina();
				maquina.setId(resultSet.getInt("id_maquina"));
				maquina.setIp(resultSet.getString("ip"));
				maquina.setNome(resultSet.getString("nome_pc"));

				String input = resultSet.getString("hora_inicial");

				try { // "yyyy-MM-dd HH:mm:ss"
					SimpleDateFormat f = new SimpleDateFormat(
							"yyyy-MM-dd HH:mm:ss");
					java.util.Date d = f.parse(input);
					long milliseconds = d.getTime();
					acesso.setHoraInicial(milliseconds);

				} catch (ParseException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}

				
				Usuario usuario = new Usuario();
				usuario.setId(resultSet.getInt("id_usuario"));
				usuario.setLogin(resultSet.getString("login"));

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
	 * Retorna todos os acessos de um usu�rio.
	 * 
	 * @param usuario
	 * @return
	 */
	public ArrayList<Acesso> retornaLista(Usuario usuario) {

		ArrayList<Acesso> lista = new ArrayList<Acesso>();

		PreparedStatement ps;
		try {
			ps = this.getConexao().prepareStatement(
					"SELECT * FROM acesso WHERE id_usuario = ?");
			ps.setInt(1, usuario.getId());
			ResultSet resultSet = ps.executeQuery();
			while (resultSet.next()) {
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

	/**
	 * Retorna todos os acessos de um usu�rio.
	 * 
	 * @param usuario
	 * @param data
	 *            � uma data no formato 2015-02-26 19:33:47
	 * @return
	 */
	public ArrayList<Acesso> retornaLista(Usuario usuario, String data, String data2) {
//		System.out.println("Tentar executar esta sql: "+"SELECT * FROM acesso WHERE id_usuario = ? AND hora_inicial BETWEEN \""+data+"\" AND \""+data2+"\"");
		
		ArrayList<Acesso> lista = new ArrayList<Acesso>();

		PreparedStatement ps;
		try {
			ps = this.getConexao().prepareStatement(
					"SELECT * FROM acesso WHERE id_usuario = ? AND hora_inicial BETWEEN ? AND ? LIMIT 3600");
			
			SimpleDateFormat formatarDate = new SimpleDateFormat(
					"yyyy-MM-dd HH:mm:ss");
			java.util.Date date1 = formatarDate.parse(data);
			java.util.Date date2 = formatarDate.parse(data2);
//			System.out.println(resultSet.getString("hora_acesso"));
			ps.setTimestamp(2, new Timestamp(date1.getTime()));
			ps.setTimestamp(3, new Timestamp(date2.getTime()));
			ps.setInt(1, usuario.getId());
			ResultSet resultSet = ps.executeQuery();
			while (resultSet.next()) {
				Acesso acesso = new Acesso();
				acesso.setTempoUsado(resultSet.getInt("tempo_usado"));
				lista.add(acesso);
			}
		} catch (SQLException | ParseException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}

		return lista;

	}

	public int retornaTempoUsadoHoje(Usuario usuario) {

		//Temos que pegar a data de hoje no sistema, criar uma string no formato "2015-02-26 19:33:47"
		// Manda um sql que selecione apenas coisas da data atual.


		DateFormat dateFormat = new SimpleDateFormat("yyyy-MM-dd");
		java.util.Date date = new java.util.Date();
		
		GregorianCalendar calendar = new GregorianCalendar(); 
		int hora = calendar.get(Calendar.HOUR_OF_DAY);
		
		String dataInicioDoDia = dateFormat.format(date)+" 01:01:01";
		String dataFinalDoDia = dateFormat.format(date)+" 23:59:59";
		
		if(hora < 12){
			dataInicioDoDia = dateFormat.format(date)+" 01:01:01";
			dataFinalDoDia = dateFormat.format(date)+" 11:59:59";
		}else if((hora >= 12) && (hora < 18)){
			dataInicioDoDia = dateFormat.format(date)+" 12:00:00";
			dataFinalDoDia = dateFormat.format(date)+" 17:59:59";
		}else if(hora >= 18){
			dataInicioDoDia = dateFormat.format(date)+" 18:00:00";
			dataFinalDoDia = dateFormat.format(date)+" 23:59:59";
		}
		
		int tempo = 0;
		for (Acesso acesso : this.retornaLista(usuario, dataInicioDoDia, dataFinalDoDia)) {
			tempo += acesso.getTempoUsado();
		}
		return tempo;
	}

	public int retornaTempoUsado(Usuario usuario) {

		// Manda um sql que selecione apenas coisas da data atual.

		int tempo = 0;
		for (Acesso acesso : this.retornaLista(usuario)) {
			tempo += acesso.getTempoUsado();
		}
		return tempo;
	}

	/**
	 * Retorna true se a m�quina for cadastrada com sucesso.
	 * 
	 * @param maquina
	 * @return
	 */

	public boolean cadastra(Maquina maquina) {
		Acesso acesso = maquina.getAcesso();
		try {

			PreparedStatement ps2 = this
					.getConexao()
					.prepareStatement(
							"INSERT into acesso(id_usuario, tempo_usado, hora_inicial, id_maquina, tempo_oferecido, ip) VALUES(?, ?, ?, ?, ?, ?)");
			ps2.setInt(1, acesso.getUsuario().getId());
			ps2.setInt(2, acesso.getTempoUsado());
			
			//Isso aqui é um erro. Essa data deve ser definida antes. No momento da criação do acesso. '','
//			long dataDeEntrada = System.currentTimeMillis()-(acesso.getTempoUsado()*1000);
//			System.out.println("Tempo Atual: "+System.currentTimeMillis());
//			System.out.println("Segundos usados: "+acesso.getTempoUsado());
//			System.out.println("Subtraindo, tEmos"+dataDeEntrada);
//			
//			System.out.println("Atual: "+new Timestamp(System.currentTimeMillis()));
//			
//			System.out.println("Subtraido: "+new Timestamp(dataDeEntrada));
			
			ps2.setTimestamp(3, new Timestamp(acesso.getHoraInicial()));
//			System.out.println(maquina.toString());
			ps2.setInt(4, maquina.getId());
			ps2.setInt(5, acesso.getTempoDisponibilizado());
			ps2.setString(6, maquina.getIp());
			ps2.executeUpdate();

			return true;

		} catch (SQLException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
			return false;
		}
	}


}
