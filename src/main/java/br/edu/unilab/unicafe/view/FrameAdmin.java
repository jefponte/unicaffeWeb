package br.edu.unilab.unicafe.view;

import java.awt.BorderLayout;
import java.awt.EventQueue;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import javax.swing.JScrollPane;
import javax.swing.JTextArea;

import java.awt.Color;

public class FrameAdmin extends JFrame {

	/**
	 * 
	 */
	private JPanel contentPane;

	/**
	 * Launch the application.
	 */


	private JTextArea textArea;
	public JTextArea getTextArea(){
		return this.textArea;
	}
	public void setTextArea(JTextArea textArea){
		this.textArea = textArea;
	}
	/**
	 * Create the frame.
	 */
	public FrameAdmin() {
		setTitle("UniCafeAdmin");
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 450, 300);
		contentPane = new JPanel();
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		contentPane.setLayout(new BorderLayout(0, 0));
		setContentPane(contentPane);
		
		JScrollPane scrollPane = new JScrollPane();
		contentPane.add(scrollPane, BorderLayout.CENTER);
		
		textArea = new JTextArea();
		textArea.setRows(5);
		textArea.setForeground(new Color(0, 153, 0));
		//textArea.setEditable(false);
		textArea.setColumns(20);
		textArea.setBackground(Color.BLACK);
		scrollPane.setViewportView(textArea);
	}

}
