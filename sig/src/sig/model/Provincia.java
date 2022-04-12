/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package sig.model;

import sig.dao.ProvinciaDAO;

/**
 *
 * @author Conexão Web
 */
public class Provincia {
    
    //Atributos
    private Integer id;
    private String sigla;
    private String nome;

    public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }

    public String getSigla() {
        return sigla;
    }

    public void setSigla(String sigla) {
        this.sigla = sigla;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }
    
    public String getSigla(String nome)
    {
       ProvinciaDAO dao = new ProvinciaDAO();
       this.setSigla(dao.sigla(nome));
       
       return this.getSigla();
    }
    
}
