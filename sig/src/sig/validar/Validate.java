/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package sig.validar;

import java.util.regex.Matcher;
import java.util.regex.Pattern;
import java.util.regex.PatternSyntaxException;
import sig.model.*;

/**
 *
 * @author Conexão Web
 */
public class Validate {
    
    public static String validate(Funcionario funcionario)
    {
        
        try{
            String nome = funcionario.getNome().trim();//Retira os espaços em branco
            String email = funcionario.getEmail().trim();//Retira os espaços em branco
            String telefone = funcionario.getNome().trim();//Retira os espaços em branco
            String nif = funcionario.getNome().trim();//Retira os espaços em branco
            
            //ACEITAÇÃO DO CAMPO NOME
            Pattern pName = Pattern.compile("[a-zA-Z ]{6,30}"); //Definindo a regra (expresão) aceitável
            Matcher mName = pName.matcher(nome); //Validar a string passada como argumento
            boolean isValid = mName.matches(); //Retorna um booleano da validação (true/false)
            
            //ACEITAÇÃO DO CAMPO EMAIL
            Pattern pEmail = Pattern.compile("[a-zA-Z0-9._%-]+@[a-zA-Z0-9._-]+\\.[a-z]{2,5}"); //Definindo a regra (expresão) aceitável
            Matcher mEmail = pEmail.matcher(funcionario.getEmail()); //Validar a string passada como argumento
            boolean isValidEmail = mEmail.matches(); //Retorna um booleano da validação (true/false)
            
            //ACEITAÇÃO DO CAMPO TELEFONE 1
            Pattern pTelefone = Pattern.compile("[0-9]{9,12}"); //Definindo a regra (expresão) aceitável
            Matcher mTelefone = pTelefone.matcher(funcionario.getTelefone1()); //Validar a string passada como argumento
            boolean isValidTelefone = mTelefone.matches(); //Retorna um booleano da validação (true/false)
            
            //ACEITAÇÃO DO CAMPO  NIF
            Pattern pNIF = Pattern.compile("[0-9]{6,9}+[A-Z]{2}+[0-9]{3}"); //Definindo a regra (expresão) aceitável
            Matcher mNIF = pNIF.matcher(funcionario.getNif()); //Validar a string passada como argumento
            boolean isValidNIF = mNIF.matches(); //Retorna um booleano da validação (true/false)
            
            //ACEITAÇÃO DO CAMPO  MUNICÍPIO
            Pattern pMunicipio = Pattern.compile("[A-Za-z]+{5,15}"); //Definindo a regra (expresão) aceitável
            Matcher mMunicipio = pMunicipio.matcher(funcionario.getMunicipio()); //Validar a string passada como argumento
            boolean isValidMunicipio = mMunicipio.matches(); //Retorna um booleano da validação (true/false)
            
//            JOptionPane.showMessageDialog(null, funcionario.getNome());

            if(!isValid){ return "Nome inválido";   }
            if(!isValidEmail){ return "Email inválido";}
            if(!isValidTelefone){ return "Número inválido";}
            if(!isValidNIF){ return "NIF inválido";}
            if(!isValidMunicipio){ return "Município inválido";}
        }catch(PatternSyntaxException pse){
            return "Erro: "+pse;
        }
        
        return "OK";
    }
    
}
