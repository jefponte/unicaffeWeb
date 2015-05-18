package br.edu.unilab.unicafe.view;
import javax.swing.JFrame;
import javax.swing.JPanel;
import javax.swing.border.EmptyBorder;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;
import javax.swing.JLabel;
import java.awt.Font;
import javax.swing.SwingConstants;
import java.awt.Color;
import javax.swing.ImageIcon;

public class FrameAviso extends JFrame {

	private JPanel contentPane;
	private JLabel labelAviso3;
	private JLabel labelAviso2;
	private JLabel labelAviso;
	private JLabel label_3;
	
	public FrameAviso() {
		setAlwaysOnTop(true);
		setDefaultCloseOperation(JFrame.DO_NOTHING_ON_CLOSE);
		setResizable(false);
		setUndecorated(true);
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		setBounds(100, 100, 450, 300);
		contentPane = new JPanel();
		contentPane.setBackground(Color.WHITE);
		contentPane.addMouseListener(new MouseAdapter() {
			@Override
			public void mousePressed(MouseEvent e) {
				setVisible(false);
			}
		});
		contentPane.setBorder(new EmptyBorder(1, 1, 1, 1));
		setContentPane(contentPane);
		contentPane.setLayout(null);
		
		labelAviso3 = new JLabel("Ankama wu kwaze níkuhela", JLabel.CENTER);
		labelAviso3.setIcon(new ImageIcon("C:\\Users\\dtiusr\\Pictures\\java\\icones\\relogio.png"));
		labelAviso3.setOpaque(true);
		labelAviso3.setBackground(Color.WHITE);
		labelAviso3.setForeground(Color.BLACK);
		labelAviso3.setFont(new Font("Tahoma", Font.PLAIN, 16));
		labelAviso3.setBounds(0, 220, getWidth(), 29);
		contentPane.add(labelAviso3);
		
		labelAviso2 = new JLabel("Bu tempu pertu kaba. ", JLabel.CENTER);
		labelAviso2.setIcon(new ImageIcon("C:\\Users\\dtiusr\\Pictures\\java\\icones\\relogio.png"));
		labelAviso2.setOpaque(true);
		labelAviso2.setBackground(Color.WHITE);
		labelAviso2.setForeground(Color.BLACK);
		labelAviso2.setFont(new Font("Tahoma", Font.PLAIN, 16));
		labelAviso2.setBounds(0, 180,getWidth(), 29);
		contentPane.add(labelAviso2);
		
		
		labelAviso = new JLabel("O seu tempo está acabando. ", JLabel.CENTER);
		labelAviso.setIcon(new ImageIcon("C:\\Users\\dtiusr\\Pictures\\java\\icones\\relogio.png"));
		labelAviso.setForeground(Color.BLACK);
		labelAviso.setBackground(Color.WHITE);
		labelAviso.setFont(new Font("Tahoma", Font.PLAIN, 16));
		labelAviso.setBounds(0, 140, getWidth(), 29);
		labelAviso.setOpaque(true);
		contentPane.add(labelAviso);
		
		label_3 = new JLabel("", JLabel.CENTER);
		label_3.setIcon(new ImageIcon("C:\\Users\\dtiusr\\Pictures\\java\\unicafe-logo-p.png"));
		label_3.setBounds(0 , 55, getWidth(), 55);
		contentPane.add(label_3);
		setLocationRelativeTo(null);
	}
}
