/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package sig.model;

import sig.dao.FuncionarioDAO;

/**
 *
 * @author Conexão Web
 */
public class Funcionario extends Pessoa{
    
    private Genero genero;
    private String tipo;
    private String senha;

    //Construtor
    public Funcionario(String nome, String nif, String email, String telefone1, String telefone2, String pais, Provincia provincia, String municipio, String endereco) {
        super(nome, nif, email, telefone1, telefone2, pais, provincia, municipio, endereco);
    }
    
    //Construtor
    public Funcionario(){
        super();
    }
    
    

    //GETTERS & SETTERS
    public Genero getGenero() {
        return genero;
    }

    public void setGenero(Genero genero) {
        this.genero = genero;
    }

    public String getTipo() {
        return tipo;
    }

    public void setTipo(String tipo) {
        this.tipo = tipo;
    }

    public String getSenha() {
        return senha;
    }

    public void setSenha(String senha) {
        this.senha = senha;
    }
    
    //Guardar dados
    public String save(Funcionario funcionario) throws Exception
    {
        FuncionarioDAO dao = new FuncionarioDAO();
        Provincia prov = new Provincia();
        
        prov.setSigla(prov.getSigla(funcionario.getProvincia().getNome()));
        funcionario.setProvincia(prov);
        
        if(dao.insertFuncionario(funcionario))
            return "Salvo com sucesso!";
        return "Erro ao salvar";
    }   
}
