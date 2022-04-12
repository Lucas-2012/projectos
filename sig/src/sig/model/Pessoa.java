/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package sig.model;

/**
 *
 * @author Conexão Web
 */
abstract class Pessoa {
    
    //ATRIBUTOS
    private Integer id;
    protected String nome;
    protected String numBI;
    protected String nif;
    protected Genero genero;
    protected String email;
    protected String telefone1;
    protected String telefone2;
    protected String pais;
    protected Provincia provincia;
    protected String municipio;
    protected String endereco;
    
    //Construtor
    @SuppressWarnings("OverridableMethodCallInConstructor")
    public Pessoa (String nome, String nif, String email, String telefone1, String telefone2, String pais, Provincia provincia, String municipio, String endereco)
    {
        this.setNome(nome);
        this.setNif(nif);
//        this.setGenero(genero);
        this.setTelefone1(telefone1);
        this.setTelefone2(telefone2);
        this.setPais(pais);
        this.setProvincia(provincia);
        this.setMunicipio(municipio);
        this.setEndereco(endereco);
    }
    
    //Construtor
    public Pessoa(){ }
    
     public Integer getId() {
        return id;
    }

    public void setId(Integer id) {
        this.id = id;
    }
    
    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getNumBI() {
        return numBI;
    }

    public void setNumBI(String numBI) {
        this.numBI = numBI;
    }

    public String getNif() {
        return nif;
    }

    public void setNif(String nif) {
        this.nif = nif;
    }

    public Genero getGenero() {
        return genero;
    }

    public void setGenero(Genero genero) {
        this.genero = genero;
    }

    
    public String getEmail() {
        return email;
    }

    public void setEmail(String email) {
        this.email = email;
    }

    public String getTelefone1() {
        return telefone1;
    }

    public void setTelefone1(String telefone1) {
        this.telefone1 = telefone1;
    }

    public String getTelefone2() {
        return telefone2;
    }

    public void setTelefone2(String telefone2) {
        this.telefone2 = telefone2;
    }

     public String getPais() {
        return pais;
    }

    public void setPais(String pais) {
        this.pais = pais;
    }

    public Provincia getProvincia() {
        return provincia;
    }

    public void setProvincia(Provincia provincia) {
        this.provincia = provincia;
    }

    public String getMunicipio() {
        return municipio;
    }

    public void setMunicipio(String municipio) {
        this.municipio = municipio;
    }

    public String getEndereco() {
        return endereco;
    }

    public void setEndereco(String endereco) {
        this.endereco = endereco;
    }
   
    
}
