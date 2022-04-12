/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package sig.dao;

import java.sql.*;
/**
 *
 * @author Conexão Web
 */
public class ProvinciaDAO {
     //ATRIBUTOS
    protected Connection conexao;
    protected PreparedStatement pst;
    protected ResultSet rst;
    
    //CONSTRUTOR
    public ProvinciaDAO(){
        this.conexao = null;
        this.pst     = null;
        this.rst     = null;
    }
    
    public String sigla(String nome){
        
        try{
            String SQL = "SELECT sigla FROM provincia WHERE nome = ?";
            
            conexao = Conexao.conectar();
            pst     = conexao.prepareStatement(SQL);
            
            pst.setString(1, nome);
            rst = pst.executeQuery();
            
            if(rst.next())
                return rst.getString("sigla");
        }catch(Exception exc){
            return "Exception: "+exc;
        }
        
        return "Erro";
    }
}
