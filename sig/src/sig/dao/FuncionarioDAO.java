/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package sig.dao;

import java.sql.*;
import sig.model.*;
import java.sql.Connection;
import javax.swing.JOptionPane;

/**
 *
 * @author Conexão Web
 */
public class FuncionarioDAO {
    
    //ATRIBUTOS
    protected Connection conexao;
    protected PreparedStatement pst;
    protected ResultSet rst;
    
    //CONSTRUTOR
    public FuncionarioDAO(){
        this.conexao = null;
        this.pst     = null;
        this.rst     = null;
    }
    
    //INSERE DADOS NA TABELA
    public boolean insertFuncionario (Funcionario funcionario)throws Exception
    {
        boolean ok;
        try{
            JOptionPane.showMessageDialog(null, "Dados a serem armazenados\n"
                                    + "\nSenha: "+funcionario.getSenha()+""
                                    + "\nNif: "+funcionario.getNif()+""
                                    + "\nNome: "+funcionario.getNome()+""
                                    + "\nTelefone 1: "+funcionario.getTelefone1()+""
                                    + "\nPais: "+funcionario.getPais()+""
                                    + "\nProvíncia: "+funcionario.getProvincia().getSigla()+""
                                    + "\nMunicípio: "+funcionario.getMunicipio()+""
                                    + "\nEndereço: "+funcionario.getEndereco()+""
                                    + "\nGenero: "+funcionario.getGenero().toString()+""
                                    + "\nEmail: "+funcionario.getEmail()+""
                                    + "\nTipo: "+funcionario.getTipo());
            String SQL = "INSERT INTO funcionario (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            
            conexao = Conexao.conectar();
            pst     = conexao.prepareStatement(SQL);
            
            pst.setString(1, funcionario.getSenha());
            pst.setString(2, funcionario.getNif());
            pst.setString(3, funcionario.getNome());
            pst.setString(4, funcionario.getEmail());
            pst.setString(5, funcionario.getTelefone1());
            pst.setString(6, funcionario.getTelefone2());
            pst.setString(7, funcionario.getPais());
            pst.setString(8, funcionario.getProvincia().getSigla());
            pst.setString(9, funcionario.getMunicipio());
            pst.setString(10, funcionario.getEndereco());
            pst.setString(11, funcionario.getGenero().toString());
            pst.setString(12, funcionario.getTipo());
            
            ok = pst.execute();
        }catch(Exception ex){
            JOptionPane.showMessageDialog(null, "Erro: "+ex);
            ok = false;
        }
        
        
        
        return ok;
    }
    
}
