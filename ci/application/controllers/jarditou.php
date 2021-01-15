<?php
// application/controllers/Produits.php

defined('BASEPATH') OR exit('No direct script access allowed');

class jarditou extends CI_Controller 
{
    public function liste(){
        // Charge la librairie 'database'
        //$this->load->database();
    
        // Exécute la requête 
        $results = $this->db->query("SELECT * FROM produits");  
    
        // Récupération des résultats    
        $aListe = $results->result();   
    
        // Ajoute des résultats de la requête au tableau des variables à transmettre à la vue   
        $aView["liste_produits"] = $aListe;
        $aViewHeader = ["title" => "Tableau Administrateur"];
        
        $this->load->view('jarditou/header/headerTableau',$aViewHeader );
         // Appel de la vue avec transmission du tableau  
        
        $this->load->view('jarditou/tableauadmin', $aView);
       
        $this->load->view('jarditou/footer/footer');
    }

    public function detailadmin($id){
        // Charge la librairie 'database'
        //$this->load->database();
    
        // Requête de sélection de l'enregistrement souhaité, ici le produit 7 
        $produit = $this->db->query("SELECT * FROM produits join categories on cat_id = pro_cat_id  WHERE pro_id= ?", $id);
        $aView["produit"] = $produit->row(); // première ligne du résultat  
      
        $aViewHeader = ["title" => "Détails produit administrateur"];
        
        $this->load->view('jarditou/header/headerdetail',$aViewHeader );
         // Appel de la vue avec transmission du tableau  
        
        $this->load->view('jarditou/detailadmin', $aView);
       
        $this->load->view('jarditou/footer/footer');
    }


    public function ajouter()
    {
        // Chargement des assistants 'form' et 'url'
        //$this->load->helper('form', 'url'); 
    
        // Chargement de la librairie 'database'
        //$this->load->database();  
    
        // Chargement de la librairie form_validation
        //$this->load->library('form_validation'); 
        $aViewHeader = ["title" => "Ajoutd'un produit"];
    
        // Requête de sélection de l'enregistrement souhaité, ici le produit 7 
      
        $categorie = $this->db->query("SELECT * FROM categories");
        $aListe = $categorie->result();  
        $aView["liste_categorie"] = $aListe; // première ligne du résultat

        //Existance Référence
        $reference = $this->db->query("SELECT pro_ref FROM produits");
        $aListeref = $reference ->result();  
        $ref["ref"] = $aListeref; // première ligne du résultat
    
        if ($this->input->post()) 
        { // 2ème appel de la page: traitement du formulaire
    
            $data = $this->input->post();

           
           
    
        // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'pro_ref'
         $this->form_validation->set_rules('pro_ref', 'Référence', 'required', array("required" => "La %s doit être obligatoire."));
         //Mise en page personaliser du message d'erreur
         $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');  
         
         $this->form_validation->set_rules('pro_prix', 'Prix', 'required|greater_than[0]', array("required" => "Le %s doit être obligatoire.", "greater_than" => "Le %s doit être un nombre positif."));
         //Mise en page personaliser du message d'erreur
         $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
          
        
         $this->form_validation->set_rules('pro_stock', 'Stock', 'required|is_natural', array("required" => "Le %s doit être obligatoire.","is_natural" => "Le %s doit être un entier positif ou nul."));
        //Mise en page personaliser du message d'erreur
         $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>'); 

         
        
         
    
           if ($this->form_validation->run() == FALSE)
           { // Echec de la validation, on réaffiche la vue formulaire 
                $this->load->view('jarditou/header/headerDetail',$aViewHeader);            
                $this->load->view('jarditou/ajout', $aView);
                $this->load->view('jarditou/footer/footer');
           }
           else
           { // La validation a réussi, nos valeurs sont bonnes, on peut modifier en base  
    
              /* Utilisation de la méthode where() toujours 
              * avant select(), insert() ou update()
              * dans cette configuration sur plusieurs lignes 
              */
               
              
              
            $this->db->insert('produits', $data);
            redirect("jarditou/liste");
          }
        } 
        else 
        { // 1er appel de la page: affichage du formulaire 
           $this->load->view('jarditou/header/headerDetail',$aViewHeader);
           $this->load->view('jarditou/ajout', $aView);
           $this->load->view('jarditou/footer/footer');
        }
    } // -- modifier()




    public function modifier($id)
    {
        // Chargement des assistants 'form' et 'url'
        //$this->load->helper('form', 'url'); 
    
        // Chargement de la librairie 'database'
        //$this->load->database();  
    
        // Chargement de la librairie form_validation
        //$this->load->library('form_validation'); 
        $aViewHeader = ["title" => "Mofification d'un produit"];
    
        // Requête de sélection de l'enregistrement souhaité, ici le produit 7 
        $produit = $this->db->query("SELECT * FROM produits join categories on cat_id = pro_cat_id  WHERE pro_id= ?", $id);
        $aView["produit"] = $produit->row(); // première ligne du résultat
        
        $categorie = $this->db->query("SELECT * FROM categories");
        $aListe = $categorie->result();  
        $aView["liste_categorie"] = $aListe; // première ligne du résultat

        //Existance Référence
        $reference = $this->db->query("SELECT pro_ref FROM produits");
        $aListeref = $reference ->result();  
        $ref["ref"] = $aListeref; // première ligne du résultat
    
        if ($this->input->post()) 
        { // 2ème appel de la page: traitement du formulaire
    
            $data = $this->input->post();

            $bool=true;
            if ($data['pro_ref'] != $aView["produit"]->pro_ref){
                foreach ($ref["ref"] as $row1){
                     if($row1->pro_ref == $aView["produit"]->pro_ref){
                         $bool = false;
                        }
                    }
                }
           
    
        // Définition des filtres, ici une valeur doit avoir été saisie pour le champ 'pro_ref'
         $this->form_validation->set_rules('pro_ref', 'Référence', 'required', array("required" => "La %s doit être obligatoire."));
         //Mise en page personaliser du message d'erreur
         $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');  
         
         $this->form_validation->set_rules('pro_prix', 'Prix', 'required|greater_than[0]', array("required" => "Le %s doit être obligatoire.", "greater_than" => "Le %s doit être un nombre positif."));
         //Mise en page personaliser du message d'erreur
         $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>');
          
        
         $this->form_validation->set_rules('pro_stock', 'Stock', 'required|is_natural', array("required" => "Le %s doit être obligatoire.","is_natural" => "Le %s doit être un entier positif ou nul."));
        //Mise en page personaliser du message d'erreur
         $this->form_validation->set_error_delimiters('<div class="alert alert-danger">', '</div>'); 

         
        
         
    
           if ($this->form_validation->run() == FALSE)
           { // Echec de la validation, on réaffiche la vue formulaire 
                $this->load->view('jarditou/header/headerDetail',$aViewHeader);            
                $this->load->view('jarditou/modification', $aView);
                $this->load->view('jarditou/footer/footer');
           }
           else
           { // La validation a réussi, nos valeurs sont bonnes, on peut modifier en base  
    
              /* Utilisation de la méthode where() toujours 
              * avant select(), insert() ou update()
              * dans cette configuration sur plusieurs lignes 
              */
               
              
              $this->db->where('pro_id', $id);
              $this->db->update('produits', $data);
    
              redirect("jarditou/liste");
          }
        } 
        else 
        { // 1er appel de la page: affichage du formulaire 
           $this->load->view('jarditou/header/headerDetail',$aViewHeader);
           $this->load->view('jarditou/modification', $aView);
           $this->load->view('jarditou/footer/footer');
        }
    } // -- modifier()


    public function supprimer($id)
    {
        // Chargement des assistants 'form' et 'url'
        //$this->load->helper('form', 'url'); 
    
        // Chargement de la librairie 'database'
        //$this->load->database();  
    
        
    
        // Requête de sélection de l'enregistrement souhaité, ici le produit 7 
        $produit = $this->db->query("SELECT * FROM produits WHERE pro_id= ?", $id);
        $aView["produit"] = $produit->row(); // première ligne du résultat
        $aViewHeader = ["title" => "Supression d'un produit"];
    
        if ($this->input->post()) 
        { // 2ème appel de la page: traitement du formulaire
              //$data = $this->input->post();
              $this->db->where('pro_id',$id);
              $this->db->delete('produits');
    
              redirect("jarditou/liste");
        } 
        else 
        { // 1er appel de la page: affichage du formulaire 
            $this->load->view('jarditou/header/headerDetail',$aViewHeader );
        // Appel de la vue avec transmission du tableau          
           $this->load->view('supprimer', $aView);
           $this->load->view('jarditou/footer/footer');
        }
    } // -- supprimer()


}