import java.awt.*;

import javax.swing.*;
import javax.swing.border.BevelBorder;


public class ex4janelas {


public static void main(String a[]){

	    JFrame frame = new JFrame("Exercicio 4");
	    frame.setSize(640,480);
	    frame.setVisible(true);
	    frame.setLayout(null);
	    frame.setLocation(new Point (250,250));

	    JPanel janela1 = new JPanel();
	    janela1.setBorder(javax.swing.BorderFactory.createEtchedBorder());
	    janela1.setLocation(new Point(10,40));
		janela1.setSize(600,20);
		janela1.setVisible(true);
		frame.add(janela1);

	    JPanel janela = new JPanel();
	    janela.setBorder(javax.swing.BorderFactory.createBevelBorder(javax.swing.border.BevelBorder.RAISED));
	    janela.setLocation(new Point(20,80));
		janela.setSize(200,350);
		janela.setVisible(true);
		frame.add(janela);

		    JPanel janela2 = new JPanel();
		    janela2.setBorder(javax.swing.BorderFactory.createBevelBorder(javax.swing.border.BevelBorder.LOWERED));
		    janela2.setLocation(new Point(400,80));
			janela2.setSize(200,350);
			janela2.setVisible(true);
			frame.add(janela2);
}
} 