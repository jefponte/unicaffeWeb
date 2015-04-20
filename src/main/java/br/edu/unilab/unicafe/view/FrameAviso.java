package br.edu.unilab.unicafe.view;

import java.awt.BorderLayout;
import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import javax.swing.JLabel;
import java.awt.GridLayout;
import java.awt.Font;

public class FrameAviso extends JFrame {

	private JPanel contentPane;
	private JLabel aviso1;
	
	public JLabel getAviso1(){
		return this.aviso1;
	}
	
	public JLabel getAviso2(){
		return this.aviso2;
	}
	private JLabel aviso2;
	
	
	public FrameAviso() {
		setAlwaysOnTop(true);
		setDefaultCloseOperation(JFrame.DO_NOTHING_ON_CLOSE);
		setResizable(false);
		setUndecorated(true);
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 450, 300);
		contentPane = new JPanel();
		contentPane.addMouseListener(new MouseAdapter() {
			@Override
			public void mousePressed(MouseEvent e) {
				setVisible(false);
			}
		});
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		contentPane.setLayout(new BorderLayout(0, 0));
		setContentPane(contentPane);
		
		JPanel panel = new JPanel();
		contentPane.add(panel, BorderLayout.CENTER);
		panel.setLayout(null);
		
		aviso1 = new JLabel("O seu tempo está acabando. ");
		aviso1.setFont(new Font("Times New Roman", Font.BOLD, 18));
		aviso1.setBounds(105, 95, 238, 29);
		panel.add(aviso1);
		
		aviso2 = new JLabel("Bu tempu pertu kaba. ");
		aviso2.setFont(new Font("Times New Roman", Font.BOLD, 18));
		aviso2.setBounds(128, 135, 197, 40);
		setLocationRelativeTo(null);  
		panel.add(aviso2);
	}
}
