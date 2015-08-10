package br.edu.unilab.unicafe.main;


import java.net.DatagramPacket;
import java.net.DatagramSocket;
import java.net.InetAddress;


public class MainUpdate {
	 
    public static final int PORT = 9;    
    public static void main(String[] args) {
		
	

		
		

		
//		
//		JFrame teste = new JFrame();
//		teste.setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
//		teste.setSize(300, 400);
//		teste.setVisible(true);
//		Update update = new Update();
//		update.iniciaUpdate();
		
		System.out.println("Teste");
		System.out
				.println("Usage: java WakeOnLan <broadcast-ip> <mac-address>");
		System.out
				.println("Example: java WakeOnLan 10.11.0.242 74:86:7A:FC:B6:53");
		System.out
				.println("Example: java WakeOnLan 10.11.0.242 74-86-7A-FC-B6-53");
	        
	        String ipStr = "10.11.0.242";
	        String macStr = "74-86-7A-FC-B6-53";
	        
	        try {
	            byte[] macBytes = getMacBytes(macStr);
	            byte[] bytes = new byte[6 + 16 * macBytes.length];
	            for (int i = 0; i < 6; i++) {
	                bytes[i] = (byte) 0xff;
	            }
	            for (int i = 6; i < bytes.length; i += macBytes.length) {
	                System.arraycopy(macBytes, 0, bytes, i, macBytes.length);
	            }
	            
	            InetAddress address = InetAddress.getByName(ipStr);
	            DatagramPacket packet = new DatagramPacket(bytes, bytes.length, address, PORT);
	            DatagramSocket socket = new DatagramSocket();
	            socket.send(packet);
	            socket.close();
	            
	            System.out.println("Wake-on-LAN packet sent.");
	        }
	        catch (Exception e) {
	            System.out.println("Failed to send Wake-on-LAN packet: + e");
	            System.exit(1);
	        }
	        
	    }
	    
	    private static byte[] getMacBytes(String macStr) throws IllegalArgumentException {
	        byte[] bytes = new byte[6];
	        String[] hex = macStr.split("(\\:|\\-)");
	        if (hex.length != 6) {
	            throw new IllegalArgumentException("Invalid MAC address.");
	        }
	        try {
	            for (int i = 0; i < 6; i++) {
	                bytes[i] = (byte) Integer.parseInt(hex[i], 16);
	            }
	        }
	        catch (NumberFormatException e) {
	            throw new IllegalArgumentException("Invalid hex digit in MAC address.");
	        }
	        return bytes;
	    }
}
