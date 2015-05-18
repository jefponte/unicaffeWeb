package br.edu.unilab.unicafe.view;
import javax.swing.ImageIcon;
import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;

import java.awt.Color;
import java.awt.EventQueue;

import javax.swing.JLabel;

public class FrameSplash extends JFrame {
	private JPanel contentPane;
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					FrameSplash frame = new FrameSplash();
					frame.setVisible(true);
					
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}
	public FrameSplash() {
		
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
		
	}
	
}
