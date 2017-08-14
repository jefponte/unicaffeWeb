package br.edu.unilab.unicaffe.view;

import java.awt.Color;
import java.awt.Dimension;
import java.awt.Toolkit;
import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import javax.swing.JLabel;
import javax.swing.ImageIcon;

public class FrameDescanso extends JFrame {

	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;
	private JPanel contentPane;

	


	/**
	 * Create the frame.
	 */
	public FrameDescanso() {
		setUndecorated(true);
		setExtendedState(MAXIMIZED_BOTH);
		Toolkit tk = Toolkit.getDefaultToolkit();  
	    Dimension d = tk.getScreenSize();  
		setSize(d.width, d.height);
		contentPane = new JPanel();
		contentPane.setBackground(new Color(0, 0, 0));
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setContentPane(contentPane);
		contentPane.setLayout(null);
		JLabel label = new JLabel("");
			
		label.setIcon(new ImageIcon(getClass().getResource(UtilFrames.BASE_PATH_IMAGES + "logo-protetor.png")));
		label.setBounds((getWidth()/2-250), (getHeight()/2-106), 500, 112);
		contentPane.add(label);
		setDefaultCloseOperation(JFrame.DO_NOTHING_ON_CLOSE);
	}
}
