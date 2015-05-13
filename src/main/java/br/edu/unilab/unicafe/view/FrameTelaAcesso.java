package br.edu.unilab.unicafe.view;
import java.awt.Color;
import java.awt.Cursor;
import java.awt.Dimension;
import java.awt.EventQueue;
import java.awt.Toolkit;

import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import javax.swing.JLabel;
import javax.swing.ImageIcon;

import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import javax.swing.JButton;
import java.awt.Font;

public class FrameTelaAcesso extends JFrame {

	private JPanel contentPane;

	/**
	 * Launch the application.
	 */
	public static void main(String[] args) {
		EventQueue.invokeLater(new Runnable() {
			public void run() {
				try {
					FrameTelaAcesso frame = new FrameTelaAcesso();
					frame.setVisible(true);
				} catch (Exception e) {
					e.printStackTrace();
				}
			}
		});
	}

	/**
	 * Create the frame.
	 */
	public FrameTelaAcesso() {
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setUndecorated(true);
		setAlwaysOnTop(true);
		Toolkit tk = Toolkit.getDefaultToolkit();  
	    Dimension d = tk.getScreenSize();  
		setSize(d.width, 45);
		setOpacity(0.8f);
		contentPane = new JPanel();
		contentPane.addMouseListener(new MouseAdapter() {
			@Override
			public void mouseEntered(MouseEvent e) {
				
				setOpacity(1f);
			}
			@Override
			public void mouseExited(MouseEvent e) {
				
				setOpacity(0.8f);
			}
		});
		
		contentPane.setBackground(new Color(0, 158, 216));
		contentPane.setBorder(new EmptyBorder(5, 5, 5, 5));
		setContentPane(contentPane);
		contentPane.setLayout(null);
		
		JLabel label = new JLabel("");
		label.setIcon(new ImageIcon("C:\\Users\\dtiusr\\Pictures\\java\\unicafe-logo-pp-b.png"));
		label.setBounds(10, 5, 213, 35);
		contentPane.add(label);
		
		JButton btnFinalizar = new JButton("Finalizar");
		btnFinalizar.setIcon(new ImageIcon("C:\\Users\\dtiusr\\Music\\icones\\sair.png"));
		btnFinalizar.setFont(new Font("Tahoma", Font.PLAIN, 14));
		btnFinalizar.setForeground(new Color(255, 255, 255));
		btnFinalizar.addMouseListener(new MouseAdapter() {
			@Override
			public void mouseEntered(MouseEvent e) {
				
				setOpacity(1f);
			}
		});
		btnFinalizar.setBackground(new Color(164, 94, 77));
		btnFinalizar.setBounds((getWidth()-110), 5, 100, 35);
		contentPane.add(btnFinalizar);
		btnFinalizar.setCursor(new Cursor(Cursor.HAND_CURSOR));
		btnFinalizar.setFocusable(false);
		btnFinalizar.setBorder(new EmptyBorder(1, 1, 1, 1));
		
		
		
		
		JButton btnChat = new JButton("Chat");
		btnChat.setIcon(new ImageIcon("C:\\Users\\dtiusr\\Music\\icones\\chat.png"));
		btnChat.setFont(new Font("Tahoma", Font.PLAIN, 14));
		btnChat.setForeground(new Color(255, 255, 255));
		btnChat.addMouseListener(new MouseAdapter() {
			@Override
			public void mouseEntered(MouseEvent e) {
				
				setOpacity(1f);
			}
		});
		btnChat.setBackground(new Color(248, 158, 50));
		btnChat.setBounds((getWidth()-220), 5, 100, 35);
		contentPane.add(btnChat);
		btnChat.setCursor(new Cursor(Cursor.HAND_CURSOR));
		btnChat.setFocusable(false);
		btnChat.setBorder(new EmptyBorder(1, 1, 1, 1));
		
		
		
		
		
		JPanel panelLab = new JPanel();
		panelLab.setBackground(new Color(211, 228, 245));
		panelLab.setBounds((getWidth() - 350), 5, 120, 35);
		contentPane.add(panelLab);
		panelLab.setLayout(null);
		
		JLabel lblLabti = new JLabel("giovanildos",  JLabel.CENTER);
		lblLabti.setForeground(new Color(0, 158, 216));
		lblLabti.setFont(new Font("Tahoma", Font.PLAIN, 16));
		lblLabti.setBounds(0, 0, 120, 35);
		panelLab.add(lblLabti);
		
		JPanel panelLabIcone = new JPanel();
		panelLabIcone.setBounds((getWidth() - 385), 5, 35, 35);
		contentPane.add(panelLabIcone);
		panelLabIcone.setLayout(null);
		
		JLabel labelLabIcone = new JLabel("", JLabel.CENTER);
		labelLabIcone.setIcon(new ImageIcon("C:\\Users\\dtiusr\\Music\\icones\\user2.png"));
		labelLabIcone.setBounds(0, 0, 35, 35);
		panelLabIcone.add(labelLabIcone);
		
		
		
		
		
		
		
		JPanel panelPC = new JPanel();
		panelPC.setBackground(new Color(211, 228, 245));
		panelPC.setBounds((getWidth() - 515), 5, 120, 35);
		contentPane.add(panelPC);
		panelPC.setLayout(null);
		
		JLabel lblPC = new JLabel("00:50:23",  JLabel.CENTER);
		lblPC.setForeground(new Color(0, 158, 216));
		lblPC.setFont(new Font("Tahoma", Font.PLAIN, 16));
		lblPC.setBounds(0, 0, 120, 35);
		panelPC.add(lblPC);
		
		JPanel panelPCIcone = new JPanel();
		panelPCIcone.setBounds((getWidth() - 550), 5, 35, 35);
		contentPane.add(panelPCIcone);
		panelPCIcone.setLayout(null);
		
		JLabel labelPCIcone = new JLabel("", JLabel.CENTER);
		labelPCIcone.setIcon(new ImageIcon("C:\\Users\\dtiusr\\Music\\icones\\relogio.png"));
		labelPCIcone.setBounds(0, 0, 35, 35);
		panelPCIcone.add(labelPCIcone);
		
		
		
		
		
	}
}
