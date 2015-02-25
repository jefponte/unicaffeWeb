import javax.swing.JFrame;

import br.edu.unilab.unicafe.view.FrameClientBloqueado;
import br.edu.unilab.unicafe.view.FrameClientDesbloqueado;


public class Principal {

	public static void main(String[] args) {
		FrameClientDesbloqueado janela = new FrameClientDesbloqueado();
		janela.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		janela.setVisible(true);

	}

}
