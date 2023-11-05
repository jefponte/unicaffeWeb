package br.edu.unilab.unicaffe.main;
import br.edu.unilab.unicaffe.util.Token;
import br.edu.unilab.unicaffe.view.FrameMensagem;

/**
 * 
 * @author Jefferson Uchôa Ponte
 * Classe responsável pelo inicialização do aplicativo Token
 *
 */
public class MainToken {
	/**
	 * Método que inicia o processo. 
	 * @param args
	 */
	
	public static void main(String[] args) {

		String token = Token.geraToken();
		FrameMensagem mensagem = new FrameMensagem();
		mensagem.getLabelLegenda().setText("Gerador de Token");
		mensagem.setMensagem("Login: token                   senha:  "+token);
		mensagem.setVisible(true);
		
		try {
			for(int i = 30; i >= 0; i--) {
				Thread.sleep(1000);
				mensagem.setMensagem("Login: token                   senha:  "+token+"    "
						+ ""
						+ "                  "
						+ "                  "
						+ "                  "
						+ "                  "
						+ "              Anote isto em "+ i +" segundos ");
				
			}
			
		} catch (InterruptedException e) {
			// TODO Auto-generated catch block
			e.printStackTrace();
		}
		System.exit(0);
		
	}


	

}
