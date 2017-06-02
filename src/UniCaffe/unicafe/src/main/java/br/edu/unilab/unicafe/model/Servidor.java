package br.edu.unilab.unicafe.model;

import java.io.BufferedReader;
import java.io.BufferedWriter;
import java.io.File;
import java.io.FileInputStream;
import java.io.IOException;
import java.io.InputStreamReader;
import java.io.OutputStream;
import java.io.OutputStreamWriter;
import java.io.PrintStream;
import java.net.ServerSocket;
import java.net.Socket;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.Scanner;

import com.google.gson.Gson;

import br.edu.unilab.unicafe.dao.AcessoDAO;
import br.edu.unilab.unicafe.dao.DAO;
import br.edu.unilab.unicafe.dao.MaquinaDAO;
import br.edu.unilab.unicafe.dao.UsuarioDAO;
import br.edu.unilab.unicafe.ligador.Ligador;

/**
 * 
 * @author Jefferson
 *
 */

public class Servidor {

	private String ip;
	private ServerSocket serverSocket;
	private ArrayList<Cliente> listaDeClientes;



	public Servidor() {

		
		this.listaDeClientes = new ArrayList<Cliente>();
		this.ip = "localhost";

	}

	

	public void iniciaServico() {
	
		
		int porta = 27289;
		try {


			this.serverSocket = new ServerSocket(porta, 500);
			esperaConexoes();
		} catch (IOException e) {
			System.out.println("Não consegui utilizar a porta: "+porta+".");
			
		}
		
	}
	public void atualizaTodos(){
		for(Cliente cliente : listaDeClientes){
			new PrintStream(cliente.getSaida()).println("atualizar()");
		}
	}
	public void desligarTodos(){
		for(Cliente cliente : listaDeClientes){
			new PrintStream(cliente.getSaida()).println("desligar()");
		}
		
	}
	
	public String anotaJson(){
		
		String json = "";
		int h = 0;
		for(Cliente c : this.listaDeClientes){
			Gson geson = new Gson();
			if(h == 0){
				json = json+geson.toJson(c.getMaquina());
				h++;
				
			}else{
				json = json+"|"+geson.toJson(c.getMaquina());
			}
			//printd(json);
		}
		return json;
		
	}

	public void esperaConexoes() {
		Thread recebendoConexao = new Thread(new Runnable() {

			@Override
			public void run() {
				System.out.println("Servidor iniciado! \n Wait for Client...");
				while (true) {
					
					Socket conexao;
					try {
						conexao = serverSocket.accept();
						//printd("Nova conexão! "	+ conexao.getInetAddress().toString());
						processaConexao(conexao);
					} catch (IOException e) {
						System.out.println("Tentativa de conexão frustrada! ");
					}

				}
			}
		});
		recebendoConexao.start();

	}
	/**
	 * Testa a conexão e deleta 
	 */
	public void limpezaDeMemoria(){
		for(Cliente c: listaDeClientes){
			
			try {
				c.getConexao().close();
				
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			
		}
		listaDeClientes = new ArrayList<Cliente>();
	}

	/**
	 * 
	 * @param conexao
	 */
	public void processaConexao(final Socket conexao) {
		
		Thread processando = new Thread(new Runnable() {

			@Override
			public void run() {
				Cliente cliente = new Cliente();
				cliente.setConexao(conexao);
				try {

					cliente.setSaida(conexao.getOutputStream());
					cliente.setEntrada(conexao.getInputStream());					
					cliente.getMaquina().setIp(cliente.getConexao().getInetAddress().toString().substring(1));
					PrintStream ps = new PrintStream(cliente.getSaida());
					BufferedReader in = new BufferedReader(new InputStreamReader(cliente.getEntrada()));

					String mensagem = in.readLine();
					//System.out.println("Primeira Mensagem: "+mensagem);
					if(mensagem == null){
//						System.out.println("Comando recusado.");
//						System.out.println(mensagem);
//						System.out.println("Uma conexao recusada. ");
						ps.println("Eu sou o Servidor, meu chapa!");
						conexao.close();
						return;
					}
						
					

					if(mensagem.indexOf("GET / HTTP/1.1") != -1){
						ps.println("<!DOCTYPE html><html>"
								+ "<header><style>"
								+ "body{background-color:#FF9999;}"
								+ ""
								+ ""
								+ "</style></header>"
								+ ""
								+ "<h1>Servidor Funcionando!</h1>"
								+ "<form action=\"\" method=\"post\">"
								+ "<input type=\"text\" name=\"nome\" />"
								+ "<input type=\"submit\" />" 
								+"</form>"
								+ "</html>");
						cliente.getConexao().close();
						
					}else if (mensagem.indexOf('(') != -1 && mensagem.indexOf(')') != -1) {
						String comando = mensagem.substring(0, mensagem.indexOf('('));
						String parametros = mensagem.substring((mensagem.indexOf('(') + 1),mensagem.indexOf(')'));
						int status = Integer.parseInt(parametros);
						if(comando.equals("setStatus") && status == Maquina.STATUS_DISPONIVEL){
							cliente.getMaquina().setStatus(status);
							
							listaDeClientes.add(cliente);
							while (!conexao.isClosed()) {
								
								//Aqui trocaremos printStrema por ObjectInputStream. 
								mensagem = in.readLine();
								processaMensagem(cliente, mensagem);
							}
							listaDeClientes.remove(cliente);
							return;
							
							
						}else if(comando.equals("setStatus") && status == Maquina.STATUS_ADMIN){
							
							mensagem = in.readLine();
							processaMensagemAdmin(cliente, mensagem);
							cliente.getConexao().close();
							return;
						}else if(comando.equals("setStatus") && status == Maquina.STATUS_UPDATE){
							
							
							System.out.println("Vamos Atualizar esse cara.");
							cliente.getMaquina().setStatus(status);
							try {
								File f = new File("/dados/unicafe/UniCafeClient.exe");
								@SuppressWarnings("resource")
								FileInputStream in1 = new FileInputStream(f);
								OutputStream out = cliente.getConexao().getOutputStream(); 
								OutputStreamWriter osw = new OutputStreamWriter(out);
								BufferedWriter writer = new BufferedWriter(osw);
								writer.flush();
								int tamanho = 4096;
								byte[] buffer = new byte[tamanho]; 
								int lidos = -1;
								while ((lidos = in1.read(buffer, 0, tamanho)) != -1) { 
									 out.write(buffer, 0, lidos); 
									 System.out.println("buffo: "+buffer+" tamanho"+tamanho+" lidos:"+lidos);
								}
								System.out.println("Aweeee");
								cliente.getConexao().close();
							} catch (IOException e) {
								// TODO Auto-generated catch block
								e.printStackTrace();
							}
							
						
						}else{
							System.out.println("Comando recusado.");
//							System.out.println(mensagem);
							System.out.println("Uma conexao recusada. ");
							ps.println("Eu sou o Servidor, meu chapa!");
							conexao.close();
							return;
						}
						
					}
					
					
					
					
				} catch (IOException e) {
					if (cliente.getMaquina().getAcesso().getStatus() ==  Acesso.STATUS_EM_UTILIZACAO) {
						cliente.getMaquina().getAcesso().pararDeContar();
						AcessoDAO acessodao = new AcessoDAO();
						if(cliente.getMaquina().getLaboratorio().getId() != 0)
							acessodao.cadastra(cliente.getMaquina());
						
						try {
							acessodao.getConexao().close();
						} catch (SQLException e1) {
							System.out.println("Erro de SQLEXception.");
						}
					}
					listaDeClientes.remove(cliente);
					System.out.println("Uma maquina desconectou.");
					
					
				}

				if (cliente.getMaquina().getAcesso().getStatus() ==  Acesso.STATUS_EM_UTILIZACAO) {
					cliente.getMaquina().getAcesso().pararDeContar();
					AcessoDAO acessodao = new AcessoDAO();
					if(cliente.getMaquina().getLaboratorio().getId() != 0)
						acessodao.cadastra(cliente.getMaquina());
					
					try {
						
						acessodao.getConexao().close();
						
					} catch (SQLException e) {
						System.out.println("Erro de SQLEXception.");
					}
				}

				
				

			}
		});

		processando.start();

	}
	public String getAjuda(){
		String ajuda = "getMaquinas() - Mostra lista de máquinas em JSON\n";
		ajuda += "desligaTudo() - Desliga todas as máquinas conectadas ao servidor\n";
		ajuda += "exec(strNomeMaquina, strComando) - Executa um comando no CMD\n";
		return ajuda;
	}
	public boolean jaEstaLogado(Usuario usuario) {
		for (Cliente cliente : listaDeClientes) {
			if ((cliente.getMaquina().getAcesso().getStatus() == Acesso.STATUS_EM_UTILIZACAO) && (cliente.getMaquina().getAcesso().getUsuario().getLogin().equals(usuario.getLogin()))){ 
				cliente.getMaquina().getAcesso().pararDeContar();
				AcessoDAO dao = new AcessoDAO();
				dao.cadastra(cliente.getMaquina());
				new PrintStream(cliente.getSaida()).println("bloqueia()");
				return false;
			}
		}
		return false;
	}
	public synchronized void processaMensagemAdmin(final Cliente cliente, String mensagem) {

//		System.out.println(cliente.getConexao().getInetAddress()+">> Mensagem admin: "+mensagem);
		if(mensagem == null)
			return;
		
		if(!cliente.getConexao().getInetAddress().toString().equals("/127.0.0.1") && !cliente.getConexao().getInetAddress().toString().equals("/10.5.6.79"))
		{
			new PrintStream(cliente.getSaida()).println(cliente.getConexao().getInetAddress().toString()+">> "+"Conexao Recusada");	
			System.out.println(cliente.getConexao().getInetAddress()+">> Comando recusado, IP estranho tentando dar uma de administrador. ");
			return;
		}
		
		//Primeiro verificamos a possibilidade de uma mensagem sem parametros. 
		
		if(mensagem.equals("ajuda")){
			new PrintStream(cliente.getSaida()).println(getAjuda());
			return;
			
		}
		else if(mensagem.equals("restart")){
			try {
				Process processo = Runtime.getRuntime().exec("/etc/init.d/unicafe.sh restart");
				Scanner leitor = new Scanner(processo.getInputStream());
				while (leitor.hasNext())
					System.out.println(leitor.nextLine());
				new PrintStream(cliente.getSaida()).println("Vamos restartar");
			} catch (IOException e) {

				e.printStackTrace();
			}
			return;
		}
		else if(mensagem.equals("reboot")){
			try {
					Process processo = Runtime.getRuntime().exec("reboot");
					Scanner leitor = new Scanner(processo.getInputStream());
					while (leitor.hasNext())
						System.out.println(leitor.nextLine());
					new PrintStream(cliente.getSaida()).println("Vamos rebotar");
			} catch (IOException e) {

				e.printStackTrace();
			}
			return;
		}
		else if(mensagem.equals("stop")){
			System.exit(0);
			return;
		}
		
		
		//Vamos ver se veio um select. 
		if(mensagem.toLowerCase().indexOf("select") >= 0 || mensagem.toLowerCase().indexOf("insert") >= 0 || mensagem.toLowerCase().indexOf("update") >= 0){
//			System.out.println("Veio um SQL");
			String json = "";
			
			int h = 0;
			
			for(Cliente daVez:this.getListaDeClientes()){
				
				
				
				
				String dados = "|{\"id_maquina\":"+daVez.getMaquina().getId()+",\"nome_pc\":\""+daVez.getMaquina().getNome()+"\",\"mac\":\""+daVez.getMaquina().getEnderecoMac()+"\",\"id_acesso\":"+daVez.getMaquina().getAcesso().getId()+",\"hora_inicial\":\""+daVez.getMaquina().getAcesso().getHoraInicial()+"\",\"tempo_oferecido\":"+daVez.getMaquina().getAcesso().getTempoDisponibilizado()+",\"tempo_usado\":"+daVez.getMaquina().getAcesso().getTempoUsado()+",\"ip\":\""+daVez.getConexao().getInetAddress().toString()+"\",\"id_usuario\":"+daVez.getMaquina().getAcesso().getUsuario().getId()+",\"id_laboratorio\":"+daVez.getMaquina().getLaboratorio().getId()+",\"nome_laboratorio\":\""+daVez.getMaquina().getLaboratorio().getNome()+"\",\"nome\":\""+daVez.getMaquina().getAcesso().getUsuario().getNome()+"\",\"email\":\""+daVez.getMaquina().getAcesso().getUsuario().getEmail()+"\",\"login\":\""+daVez.getMaquina().getAcesso().getUsuario().getLogin()+"\",\"senha\":\""+daVez.getMaquina().getAcesso().getUsuario().getSenha()+"\",\"status_maquina\":"+daVez.getMaquina().getStatus()+",\"status_acesso\":"+daVez.getMaquina().getAcesso().getStatus()+",\"nivel_acesso\":\""+daVez.getMaquina().getAcesso().getUsuario().getNivelAcesso()+"\""+"}";
				
				if(h == 0){
					
					json = dados;
					h++;
					
				}else{
					
					json = json+dados;
				}
			}
			new PrintStream(cliente.getSaida()).println(json);
			return;
		}
		
		//Depois uma mensagem com parametros. 
		
		if(mensagem.indexOf('(') == -1 || mensagem.indexOf(')') == -1){
			new PrintStream(cliente.getSaida()).println("Mensagem não encontrada. Digite ajuda para obter ajuda. ");	
			return;
		} 
		
	
		String parametros = "";
//		System.out.println("Segunda mensagem: "+mensagem);
		String comando = mensagem.substring(0, mensagem.indexOf('('));
		parametros = mensagem.substring((mensagem.indexOf('(') + 1),mensagem.indexOf(')'));
		
		
		if(comando.equals("getMaquinas")){
			String json = anotaJson();
			new PrintStream(cliente.getSaida()).println(json);	
//			System.out.println("Resposta: "+json);
		}else if(comando.equals("cadastraMaquina")){
			// A gente pesquisa uma máquina com esse nome e cadastra ela. 
			boolean achei = false;
			for(Cliente daVez : listaDeClientes){
				
				if(parametros.toLowerCase().equals(daVez.getMaquina().getNome().toLowerCase())){
					achei = true;
					MaquinaDAO dao = new MaquinaDAO();
					if(dao.cadastra(daVez.getMaquina())){
						daVez.getMaquina().setCadastrada(true);
						new PrintStream(cliente.getSaida()).println("Cadastrei "+parametros);	
					}else
						new PrintStream(cliente.getSaida()).println("Erro na tentativa de cadastro de "+parametros);
					break;
				}
			}
			if(!achei)
				new PrintStream(cliente.getSaida()).println("Não encontrei "+parametros);
			return;
			
		}else if(comando.equals("ligador")){
			boolean achei = false;
			MaquinaDAO maquinaDAO = new MaquinaDAO();
			Maquina maquinaALigar = new Maquina();
			maquinaALigar.setNome(parametros.trim());
			
			if(!maquinaDAO.existe(maquinaALigar, true)){
				new PrintStream(cliente.getSaida()).println("Não encontrei no banco "+parametros);
				try {
					cliente.getConexao().close();
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
				return;
			} 
			Ligador.ligador(maquinaALigar.getEnderecoMac());
			new PrintStream(cliente.getSaida()).println("Ligando máquina: "+maquinaALigar.getNome());
			try {
				cliente.getConexao().close();
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			return;
			
			
			
			
		}else if(comando.equals("atualizaMac")){
			for(Cliente daVez : listaDeClientes){
				if(parametros.trim().toLowerCase().equals(daVez.getMaquina().getNome().trim().toLowerCase())){
					MaquinaDAO maquinaDAO = new MaquinaDAO();
					Maquina maquina = new Maquina();
					maquina.setNome(daVez.getMaquina().getNome());
					
					if(!maquinaDAO.existe(maquina, false)){
						new PrintStream(cliente.getSaida()).println("Deve cadastrar antes a: "+maquina.getNome());
						return;
					}
					
					maquinaDAO.atualizaMac(daVez.getMaquina());
					new PrintStream(cliente.getSaida()).println("Atualizei o mac de: "+maquina.getNome());
					return;
				}
			}
			
			
			
		}
		else if(comando.equals("alocarMaquina")){
			String nomeMaquina = parametros.substring(0, parametros.indexOf(','));
			String nomeLaboratorio = parametros.substring(parametros.indexOf(',') + 1);
			Laboratorio laboratorio = new Laboratorio();
			laboratorio.setNome(nomeLaboratorio.trim());
			
			System.out.println("Segundo parametro "+nomeLaboratorio);
			boolean achei = false;
			Cliente caraQueSeraMexido = null;
			for(Cliente daVez : listaDeClientes){
				if(nomeMaquina.toLowerCase().equals(daVez.getMaquina().getNome().toLowerCase())){
					achei = true;
					caraQueSeraMexido = daVez;
					break;
				}
			}
			
			
			
			
			MaquinaDAO dao = new MaquinaDAO();
			Maquina maquina = new Maquina();
			maquina.setNome(nomeMaquina);
			maquina.setLaboratorio(laboratorio);
			
			if(!dao.existeEsseLaboratorio(laboratorio))
			{
				new PrintStream(cliente.getSaida()).println("Não existe esse laboratorio "+laboratorio.getNome());
				return;
			}
			
			
			
			System.out.println("ID do laboratorio"+laboratorio.getNome()+" ID: "+laboratorio.getId() );
			System.out.println("ID do laboratorio"+maquina.getLaboratorio().getNome()+" ID: "+maquina.getLaboratorio().getId());
			if(dao.existeSemBulir(maquina))
			{
				new PrintStream(cliente.getSaida()).println("Existe a maquina "+nomeMaquina);
				if(dao.atualizaOuInsereLaboratorio(maquina)){
					new PrintStream(cliente.getSaida()).println(nomeMaquina+" adicionada a novo laboratorio");
				}else{
					new PrintStream(cliente.getSaida()).println(" Um erro na hora de atualizar ou inserir");
				}
				if(achei)
					caraQueSeraMexido.getMaquina().setLaboratorio(laboratorio);
				return;
						
			}
			else
			{
				
				if(!achei){
					new PrintStream(cliente.getSaida()).println("Não encontrei "+nomeMaquina);
					return;
				}
				
				if(dao.cadastra(caraQueSeraMexido.getMaquina())){
					maquina.setId(caraQueSeraMexido.getMaquina().getId());
					caraQueSeraMexido.getMaquina().setCadastrada(true);
					new PrintStream(cliente.getSaida()).println("Cadastrei "+nomeMaquina);	
					if(dao.atualizaOuInsereLaboratorio(maquina)){
						caraQueSeraMexido.getMaquina().setLaboratorio(laboratorio);
						new PrintStream(cliente.getSaida()).println(nomeMaquina+" adicionada a novo laboratorio");
					}else
						new PrintStream(cliente.getSaida()).println("E nao fiz mais nada");
					
					return;
				}
			}
			
			//Primeiro verificamos se esse nome ja existe no banco. 

			//Se não existir nos iremos tentar cadastrar. 
			//Logo depois inserimos um laboratorio nela que tenha esse nome, mas se o laboratorio nao existir mandamos a mensagem de erro. 
			
			//Se a maquina ja existir a gente verifica se ja existe laboratorio pra ela. 
			//Se o laboratorio nao exisitr pra ela nos definimos com insert 
			//Se o laboratorio existir nos fazemos um update 
			
			
		}
		else if(comando.equals("desligaTudo")){
			System.out.println("Vou desligar, calma.");
			for(Cliente daVez : listaDeClientes){
				new PrintStream(daVez.getSaida()).println("desligar()");
			}
			return;
		}else if(comando.equals("atualizaTudo")){
			System.out.println("Vou atualizar, calma.");
			for(Cliente daVez : listaDeClientes){
				
				new PrintStream(daVez.getSaida()).println("atualizar()");
				new PrintStream(cliente.getSaida()).println("Atualizando Tudo....");
				
				
			}
			return;
		}else if(comando.equals("desativaTudo")){
			System.out.println("Vou desativar, calma.");
			for(Cliente daVez : listaDeClientes){
				
				new PrintStream(daVez.getSaida()).println("desativar()");
				new PrintStream(cliente.getSaida()).println("desativando Tudo....");
				
				
				
			}
			return;
			
		}
		
		else if(comando.equals("aulaEmTudo")){
			System.out.println("Vou desativar, calma.");
			for(Cliente daVez : listaDeClientes){
				
				new PrintStream(daVez.getSaida()).println("desbloqueia(aula, "+18000+ ")");
				new PrintStream(cliente.getSaida()).println("aula em Tudo....");
				
				
				
			}
			return;
			
		}
		else if (comando.equals("desliga")) {
			
			System.out.println("Desligando "+parametros);
			for(Cliente desligado : listaDeClientes){
				if(desligado.getMaquina().getNome().toLowerCase().equals(parametros.toLowerCase())){
					new PrintStream(desligado.getSaida()).println("desligar()");
					new PrintStream(cliente.getSaida()).println("Desliguei o "+desligado.getMaquina().getNome());
				}
				
			}
			
			return;
			
		}
		else if (comando.equals("limparDados")) {
			
			System.out.println("Desligando "+parametros);
			for(Cliente clienteALimpar : listaDeClientes){
				if(clienteALimpar.getMaquina().getNome().toLowerCase().equals(parametros.toLowerCase())){
					new PrintStream(clienteALimpar.getSaida()).println("limparDados()");
					new PrintStream(cliente.getSaida()).println("Limpei o "+clienteALimpar.getMaquina().getNome());
				}
				
			}
			
			return;
			
		}
		else if (comando.equals("aula")) {
			
			System.out.println("Dar aula "+parametros);
			for(Cliente desligado : listaDeClientes){
				
				
				if(desligado.getMaquina().getNome().toLowerCase().equals(parametros.toLowerCase())){
					desligado.getMaquina().getAcesso().getUsuario().setNome("Aula");
					
					new PrintStream(desligado.getSaida()).println("desbloqueia(aula, "+18000+ ")");
					new PrintStream(cliente.getSaida()).println("Liberado pra aula o "+desligado.getMaquina().getNome());
				}
				
			}
			
			
		}else if (comando.equals("bloqueia")) {
			
			System.out.println("Bloquear "+parametros);
			for(Cliente desligado : listaDeClientes){
				if(desligado.getMaquina().getNome().toLowerCase().equals(parametros.toLowerCase())){
					desligado.getMaquina().getAcesso().getUsuario().setNome("Livre");
					new PrintStream(desligado.getSaida()).println("bloqueia()");
					new PrintStream(cliente.getSaida()).println("Bloqueando o "+desligado.getMaquina().getNome());
					
				}
				
			}
			
			
		}
		else if (comando.equals("desativar")) {
			
			System.out.println("Desativar "+parametros);
			for(Cliente desligado : listaDeClientes){
				if(desligado.getMaquina().getNome().toLowerCase().equals(parametros.toLowerCase())){
					new PrintStream(desligado.getSaida()).println("desativar()");
					new PrintStream(cliente.getSaida()).println("Desativando o "+desligado.getMaquina().getNome());
				}
				
			}
			
			
		}
		else if (comando.equals("limpar")) {
			limpezaDeMemoria();
			try {
				cliente.getConexao().close();
			} catch (IOException e) {
				// TODO Auto-generated catch block
				e.printStackTrace();
			}
			return;
		}
		else if(comando.equals("exec")){
			String nomeDaMaquina = parametros.substring(0, parametros.indexOf(','));
			String strCmd = parametros.substring(parametros.indexOf(',') + 1);
			for(Cliente desligado : listaDeClientes){
				if(desligado.getMaquina().getNome().toLowerCase().equals(nomeDaMaquina.toLowerCase())){
					new PrintStream(desligado.getSaida()).println("exec("+strCmd+")");
					new PrintStream(cliente.getSaida()).println("Comando executado no cliente. ");
					break;
				}
				
			}
			return;
			
			
		}else if(comando.equals("venha")){
			String nomeDaMaquina = parametros.substring(0, parametros.indexOf(','));
			String ipServidor = parametros.substring(parametros.indexOf(',') + 1);
			for(Cliente desligado : listaDeClientes){
				if(desligado.getMaquina().getNome().toLowerCase().equals(nomeDaMaquina.toLowerCase())){
					
					new PrintStream(desligado.getSaida()).println("venha("+ipServidor+")");
					new PrintStream(cliente.getSaida()).println("Comando executado no cliente. :"+"venha("+ipServidor+")");
					break;
				}
				
			}
			return;
			
			
		}
		
		else if(comando.equals("atualiza")){

			for(Cliente desligado : listaDeClientes){
				if(desligado.getMaquina().getNome().toLowerCase().equals(parametros.toLowerCase())){
					new PrintStream(desligado.getSaida()).println("atualizar()");
					new PrintStream(cliente.getSaida()).println("Aguarde....");
					break;
				}
				
			}
			return;
			
			
		}
		else{
			new PrintStream(cliente.getSaida()).println("Mensagem não encontrada. Digite ajuda para obter ajuda. ");	

			
		}
		
	}
	private UsuarioDAO daoGraduacao;
	public synchronized void processaMensagem(final Cliente cliente, String mensagem) {
		if(mensagem.indexOf('(') == -1 || mensagem.indexOf(')') == -1){
			return;
		} 
		
		
		
		String comando = mensagem.substring(0, mensagem.indexOf('('));
		String parametros = mensagem.substring((mensagem.indexOf('(') + 1),mensagem.indexOf(')'));
//		System.out.println(mensagem);
		if (comando.equals("autentica")) {
			String login = parametros.substring(0, parametros.indexOf(','));
			String senha = parametros.substring(parametros.indexOf(',') + 1);
			Usuario usuario = new Usuario();
			usuario.setLogin(login.toLowerCase());
			usuario.setSenha(senha);
			//Contar clientes e contar visitantes. 
			//Visitante também vai levar em consideração apenas máquinas no mesmo laboratório. 
			int idLaboratorio = cliente.getMaquina().getLaboratorio().getId();
			
			int numeroDeClientes = 0;
			int numeroDeVisitantes = 0;
			int numeroDeMaquinasLivres = 0;
			for(Cliente oDaVez : listaDeClientes){
				if(oDaVez.getMaquina().getAcesso().getUsuario().getLogin().equals("visitante") && oDaVez.getMaquina().getLaboratorio().getId() == idLaboratorio)
					numeroDeVisitantes++;
				if(oDaVez.getMaquina().getLaboratorio().getId() == idLaboratorio)
					numeroDeClientes++;
				if(oDaVez.getMaquina().getAcesso().getStatus() == Acesso.STATUS_DISPONIVEL && oDaVez.getMaquina().getLaboratorio().getId() == idLaboratorio)
					numeroDeMaquinasLivres++;
				
			}
			
			if(login.equals("visitante") && senha.equals(UsuarioDAO.getMD5("654321"))){
				

				//Verificar se existem 20 por centod e maquinas conectadas livres.
				if(numeroDeMaquinasLivres <= 2){
					new PrintStream(cliente.getSaida()).println("printc(Laboratório Lotado!)");
					return;
				}
				if(numeroDeVisitantes >= 5){
					new PrintStream(cliente.getSaida()).println("printc(Muitos visitantes conectados!)");
					return;
				}
				usuario.setNome("Visitante");
				cliente.getMaquina().getAcesso().setUsuario(usuario);
				
				cliente.getMaquina().getAcesso().setStatus(Acesso.STATUS_EM_UTILIZACAO);
				cliente.getMaquina().setStatus(Maquina.STATUS_OCUPADA);
				new PrintStream(cliente.getSaida()).println("desbloqueia(" + login + ", "+120+ ")");
				return;
			}
			if(login.equals("aula") && senha.equals(UsuarioDAO.getMD5("789456123"))){
				cliente.getMaquina().getAcesso().setUsuario(usuario);
				cliente.getMaquina().getAcesso().setStatus(Acesso.STATUS_EM_UTILIZACAO);
				cliente.getMaquina().setStatus(Maquina.STATUS_OCUPADA);
				new PrintStream(cliente.getSaida()).println("desbloqueia(" + login + ", "+18000+ ")");
				return;
			}
			UsuarioDAO dao = new UsuarioDAO();
			
			if (dao.autentica(usuario)) {
				if (this.jaEstaLogado(usuario)) {
					new PrintStream(cliente.getSaida()).println("printc(já está logado!)");
					return;
				}
				AcessoDAO acessoDao = new AcessoDAO();
				int tempo = acessoDao.retornaTempoUsadoHoje(usuario);
				
				if(cliente.getMaquina().getLaboratorio().getNome().trim().toLowerCase().equals("labteste")){
					daoGraduacao = new UsuarioDAO(DAO.TIPO_PG_SIGAA2);
					if(daoGraduacao.seuNivelEhGraduacao(usuario)){
						new PrintStream(cliente.getSaida()).println("printc(Bloqueado para alunos de graduação.)");												
					}else{
						new PrintStream(cliente.getSaida()).println("desbloqueia(" + login + ", "+43200+ ")");
						cliente.getMaquina().getAcesso().setUsuario(usuario);
						cliente.getMaquina().getAcesso().setTempoDisponibilizado(43200);
						cliente.getMaquina().getAcesso().setTempoUsado(0);
						cliente.getMaquina().setIp(cliente.getConexao().getInetAddress().toString().substring(1));
						cliente.getMaquina().getAcesso().contar();
						cliente.getMaquina().getAcesso().setHoraInicial(System.currentTimeMillis());
						
					}
					

				}else if (tempo <= AcessoDAO.COTA) {
					new PrintStream(cliente.getSaida()).println("desbloqueia(" + login + ", "+ ((AcessoDAO.COTA) - (tempo)) + ")");
					cliente.getMaquina().getAcesso().setUsuario(usuario);
					cliente.getMaquina().getAcesso().setTempoDisponibilizado(((AcessoDAO.COTA) - (tempo)));
					cliente.getMaquina().getAcesso().setTempoUsado(0);
					cliente.getMaquina().setIp(cliente.getConexao().getInetAddress().toString().substring(1));
					cliente.getMaquina().getAcesso().contar();
					cliente.getMaquina().getAcesso().setHoraInicial(System.currentTimeMillis());
				} 
				else if(numeroDeMaquinasLivres >= 2){
					new PrintStream(cliente.getSaida()).println("desbloqueia(" + login + ", 120)");
					cliente.getMaquina().getAcesso().setUsuario(usuario);
					cliente.getMaquina().getAcesso().setTempoDisponibilizado(((AcessoDAO.COTA) - (tempo)));
					cliente.getMaquina().getAcesso().setTempoUsado(0);
					cliente.getMaquina().setIp(cliente.getConexao().getInetAddress().toString().substring(1));
					cliente.getMaquina().getAcesso().contar();
					cliente.getMaquina().getAcesso().setHoraInicial(System.currentTimeMillis());
				}
				
				else {
					try {
						cliente.getSaida().flush();
						new PrintStream(cliente.getSaida()).println("printc(Seu tempo acabou)");
						return;
					} catch (IOException e) {
						// TODO Auto-generated catch block
						e.printStackTrace();
					}
				}
				try {
					dao.getConexao().close();
				} catch (SQLException e) {
					e.printStackTrace();
				}
				return;

			} else {
				try {
					cliente.getSaida().flush();
					new PrintStream(cliente.getSaida()).println("printc(Errou o login ou a senha)");
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
			}

			try {
				dao.getConexao().close();
			} catch (SQLException e) {
				e.printStackTrace();
			}
			return;
		}
		else if (comando.equals("meDaBonus")) {
			int disponiveis = 0;
			/*
			 * Iremos considerar apenas máquinas em seu laboratório. 
			 * 
			 */
			int idLaboratorio = cliente.getMaquina().getLaboratorio().getId();
			
			for(Cliente umCliente : listaDeClientes){
				
				if(umCliente.getMaquina().getStatus() == Maquina.STATUS_DISPONIVEL && umCliente.getMaquina().getLaboratorio().getId() == idLaboratorio){
					disponiveis++;
					
				}		
			}
			if(disponiveis >= 2){
				new PrintStream(cliente.getSaida()).println("bonus()");

			}
		
		}
		else if (comando.equals("setNome")) {

			String nome = parametros;
			//Antes de setar o nome temos que excluir outras que possuem o mesmo nome. 
			//Além de excluir de nossa lista iremos fechar a conexão. 
			
			
			cliente.getMaquina().setNome(nome);
			
			MaquinaDAO maquinaDao = new MaquinaDAO();
			if (maquinaDao.existe(cliente.getMaquina(), false)) 
				cliente.getMaquina().setCadastrada(true);
			else
				cliente.getMaquina().setCadastrada(false);
			
				

			
			try {
				maquinaDao.getConexao().close();
			} catch (SQLException e) {
				e.printStackTrace();
			}

		} else if (comando.equals("setMac")) {
			cliente.getMaquina().setEnderecoMac(parametros);

		} else if (comando.equals("setVersao")) {
			cliente.getMaquina().setVersao(parametros);

		} else if (comando.equals("setStatus")) {
			int status = Integer.parseInt(parametros);
			cliente.getMaquina().setStatus(status);
			switch(status){
				case Maquina.STATUS_DISPONIVEL:
					if(cliente.getMaquina().getAcesso().getStatus() == Acesso.STATUS_EM_UTILIZACAO){
						cliente.getMaquina().getAcesso().pararDeContar();
						cliente.getMaquina().getAcesso().getUsuario().setLogin("livre");
						cliente.getMaquina().setStatus(status);
						cliente.getMaquina().getAcesso().setStatus(Acesso.STATUS_DISPONIVEL);
						AcessoDAO acessodao = new AcessoDAO();
						if(cliente.getMaquina().getAcesso().getUsuario().getId() != 0)
							acessodao.cadastra(cliente.getMaquina());
						
						try {
							
							acessodao.getConexao().close();
						} catch (SQLException e) {
							e.printStackTrace();
						}
						
					}
					break;
				case Maquina.STATUS_OCUPADA:
					cliente.getMaquina().setStatus(status);
					cliente.getMaquina().getAcesso().setStatus(Acesso.STATUS_EM_UTILIZACAO);
					break;
				case Maquina.STATUS_DESCONECTADA:
					listaDeClientes.remove(cliente);
					break;
				case Maquina.STATUS_UPDATE:
					System.out.println("Vamos Atualizar esse cara.");
					cliente.getMaquina().setStatus(status);
					
					
					
					 
				try {
					
					File f = new File("UniCafeClient.exe");
					@SuppressWarnings("resource")
					FileInputStream in = new FileInputStream(f);
					OutputStream out = cliente.getConexao().getOutputStream(); 
					OutputStreamWriter osw = new OutputStreamWriter(out);
					BufferedWriter writer = new BufferedWriter(osw);
					writer.flush();
					int tamanho = 4096;
					byte[] buffer = new byte[tamanho]; 
					int lidos = -1;
					while ((lidos = in.read(buffer, 0, tamanho)) != -1) { 
						 out.write(buffer, 0, lidos); 
					}
					cliente.getConexao().close();
				} catch (IOException e) {
					// TODO Auto-generated catch block
					e.printStackTrace();
				}
				
					 

				
				
					break;
				default: 
					cliente.getMaquina().setStatus(status);
					break;
			}
			
			
			
			
			System.out.println(cliente.getMaquina().getNome() + ">> Mudou o Status para "+ Maquina.statusString(status));
		} else {
			System.out.println(cliente.getMaquina().getNome() + ">>"+ " Comando não encontrado. "+mensagem);
		}


	}

	public String getIp() {
		return ip;
	}

	public void setIp(String ip) {
		this.ip = ip;
	}

	public ServerSocket getServerSocket() {
		return serverSocket;
	}

	public void setServerSocket(ServerSocket serverSocket) {
		this.serverSocket = serverSocket;
	}

	public ArrayList<Cliente> getListaDeClientes() {
		return listaDeClientes;
	}

	public void setListaDeClientes(ArrayList<Cliente> listaDeClientes) {
		this.listaDeClientes = listaDeClientes;
	}


}
