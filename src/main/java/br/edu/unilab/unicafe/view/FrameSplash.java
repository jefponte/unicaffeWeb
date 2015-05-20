package br.edu.unilab.unicafe.view;
import javax.swing.ImageIcon;
import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;

import java.awt.Color;

import javax.swing.JLabel;

public class FrameSplash extends JFrame {
	
	private static final long serialVersionUID = 1L;
	private JPanel contentPane;
	
	
	public FrameSplash() {
		setAlwaysOnTop(true);
		contentPane = new JPanel();
		contentPane.setBackground(new Color(145, 216, 247));
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setSize(800, 350);
		setContentPane(contentPane);
		contentPane.setLayout(null);
		
		JLabel label = new JLabel("");
		label.setIcon(new ImageIcon(getClass().getResource(UtilFrames.BASE_PATH_IMAGES + "unicafe-logo.png")));
		label.setBounds(100, 107, 600, 136);
		contentPane.add(label);
		setLocationRelativeTo(null);  
		setUndecorated(true);
		setDefaultCloseOperation(JFrame.DO_NOTHING_ON_CLOSE);
		
	}
	
}
