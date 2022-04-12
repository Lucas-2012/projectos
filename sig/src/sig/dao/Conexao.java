/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package sig.dao;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;

/**
 *
 * @author Conexão Web
 */
public class Conexao {
    static private Connection conn;
    
    public Conexao(){
        this.conn = null;
    }
    
    public static Connection conectar () 
    {
        try{
            Class.forName("com.mysql.cj.jdbc.Driver");
            conn = DriverManager.getConnection("jdbc:mysql://localhost/sig_bd", "root", "");
            JOptionPane.showMessageDialog(null, "Conectado com sucesso");
            return conn;
        }catch(SQLException ex){
            JOptionPane.showMessageDialog(null, "Erro na conexão "+ex);
            return null;
        } catch (ClassNotFoundException ex) {
            JOptionPane.showMessageDialog(null, "Classe não encontrada");
            return null;
        }
    }
    
}
