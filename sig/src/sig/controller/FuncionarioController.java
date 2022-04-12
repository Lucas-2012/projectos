/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package sig.controller;

import javax.swing.JOptionPane;
import sig.model.Funcionario;
import sig.model.Genero;
import sig.model.Provincia;
import sig.validar.Validate;
import sig.view.FuncionariosView;

/**
 *
 * @author Conexão Web
 */
public class FuncionarioController {

    public String create(FuncionariosView fv) throws Exception 
    {
        //INSTACIANDO OS OBJECTOS
        Funcionario funcionario = new Funcionario();
        Provincia provincia = new Provincia();
        
        //ADICIONANDO OS DADOS DA VIEW NOS ATRIBUTOS
        funcionario.setNome(fv.getTxtNome().getText());
        funcionario.setEmail(fv.getTxtEmail().getText());
        funcionario.setTelefone1(fv.getTxtTelefone1().getText());
        funcionario.setTelefone2(fv.getTxtTelefone2().getText());
        
        funcionario.setNif(fv.getTxtNif().getText());
        funcionario.setMunicipio(fv.getTxtMunicipio().getText());
        funcionario.setEndereco(fv.getTxtEndereco().getText());
        
        funcionario.setSenha(fv.getTxtSenha().getText());
        funcionario.setPais(fv.getCmbxPais().getModel().getSelectedItem().toString());
        funcionario.setTipo(fv.getCmbxTipo().getModel().getSelectedItem().toString());
        
        provincia.setNome(fv.getCmbxProvincia().getModel().getSelectedItem().toString());
        funcionario.setProvincia(provincia);
        
        if(fv.getCmbxGenero().getModel().getSelectedItem().toString().compareToIgnoreCase("Masculino")==0)
        {
            funcionario.setGenero(Genero.getM());
        }else{
            if(fv.getCmbxGenero().getModel().getSelectedItem().toString().compareTo("Feminino") == 0)
            {
                funcionario.setGenero(Genero.getF());
            }
        }
        
        String OK = Validate.validate(funcionario);
        
        if(OK.compareToIgnoreCase("ok") == 0)
            return funcionario.save(funcionario);
        
        return OK;
        
//        JOptionPane.showMessageDialog(null, "Seja Bem vindo Sr(a) "+funcionario.getNome()+"\n"
//        + "Mensagem: "+Validate.validaFuncionario(funcionario));
//        return 
    }
    
}
