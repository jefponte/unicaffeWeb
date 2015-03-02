package br.edu.unilab.unicafe.view;

import java.awt.BorderLayout;
import java.awt.Color;
import java.awt.Font;
import java.awt.event.MouseAdapter;
import java.awt.event.MouseEvent;

import javax.swing.GroupLayout;
import javax.swing.GroupLayout.Alignment;
import javax.swing.JFrame;
import javax.swing.JLabel;
import javax.swing.JPanel;
import javax.swing.SwingConstants;
import javax.swing.border.LineBorder;

/**
*
* @author Erivando Sena
*/

public class FrameApresentacao extends JFrame {

	/**
	 * 
	 */
	private static final long serialVersionUID = 1L;

	/**
	 * Launch the application.
	 */
	public FrameApresentacao() {
		initComponents();
	}
	
	/**
	 * Create the frame.
	 */
	private void initComponents() {
		setBounds(100, 100, 741, 261);
		setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
		
		// JPanel
		JPanel panel = new JPanel();
		getContentPane().add(panel, BorderLayout.CENTER);
		setDefaultCloseOperation(JFrame.DO_NOTHING_ON_CLOSE);
		setAlwaysOnTop(true);
		setUndecorated(true);
		setResizable(false);	
		panel.setBackground(Color.WHITE);
		panel.setBorder(new LineBorder(new Color(0, 0, 0)));

		// JLabels
		JLabel lblLogo = new JLabel("");
		lblLogo.setIcon(new javax.swing.ImageIcon(UtilFrames.getScaledImage(new javax.swing.ImageIcon(getClass().getResource(UtilFrames.BASE_PATH_IMAGES + "logoUnilabHorizontal.png")).getImage(), 468, 116)));
		
		JLabel lblFechar = new JLabel("X");
		lblFechar.addMouseListener(new MouseAdapter() {
			@Override
			public void mouseClicked(MouseEvent arg0) {
				setVisible(false);
			}
		});
		lblFechar.setHorizontalAlignment(SwingConstants.CENTER);
		lblFechar.setFont(new Font("Tahoma", Font.BOLD, 12));
		
		//GroupLayout
		GroupLayout gl_panel = new GroupLayout(panel);
		gl_panel.setHorizontalGroup(
			gl_panel.createParallelGroup(Alignment.LEADING)
				.addGroup(gl_panel.createSequentialGroup().addGap(114).addComponent(lblLogo, GroupLayout.PREFERRED_SIZE, 512, GroupLayout.PREFERRED_SIZE).addContainerGap(113, Short.MAX_VALUE))
				.addGroup(Alignment.TRAILING, gl_panel.createSequentialGroup().addContainerGap(716, Short.MAX_VALUE).addComponent(lblFechar, GroupLayout.PREFERRED_SIZE, 23, GroupLayout.PREFERRED_SIZE))
		);
		
		gl_panel.setVerticalGroup(
			gl_panel.createParallelGroup(Alignment.LEADING).addGroup(gl_panel.createSequentialGroup().addGroup(gl_panel.createParallelGroup(Alignment.LEADING)
						.addGroup(gl_panel.createSequentialGroup().addGap(25).addComponent(lblLogo, GroupLayout.PREFERRED_SIZE, 198, GroupLayout.PREFERRED_SIZE))
						.addComponent(lblFechar, GroupLayout.PREFERRED_SIZE, 23, GroupLayout.PREFERRED_SIZE)).addContainerGap(36, Short.MAX_VALUE))
		);
		
		panel.setLayout(gl_panel);
	}
}
