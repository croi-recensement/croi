<?php

namespace App\Controller;

use App\Form\ExcelType;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\String\Slugger\SluggerInterface;
use League\Csv\Reader;

class ExcelController extends AbstractController
{
    /**
     * @Route("/import", name="app_import_excel")
     */
    public function index(Request $request, SluggerInterface $slugger)
    {
        $form = $this->createForm(ExcelType::class);
        $form->handleRequest($request);

        if($form->isSubmitted() && $form->isValid()) { 
            $datas = $form->getData();

            if($datas['file']->getMimeType() == 'application/vnd.ms-excel'){
                $originalFilename = pathinfo($datas['file']->getClientOriginalName(), PATHINFO_FILENAME);
                $safeFilename = $slugger->slug($originalFilename);
                $newFilename = $safeFilename.'-'.uniqid().'.'.$datas['file']->guessExtension();
                
                try{
                    $datas['file']->move(
                        $this->getParameter('repertoire_excel'),
                        $newFilename
                    );
                    $reader = Reader::createFromPath('%kernel.project_dir%/public/uploads/excel/');
                    $results = $reader->fetchAssoc();
                    foreach($results as $row){
                        switch($datas['data']){
                            case 0:
                                $personne = (new Personne())
                                    ->setNom($row['nom'])
                                    ->setPrenom($row['prenom'])
                                    ->setLieuNaissance($row['lieu_naissance'])
                                    ->setNationalite($row['nationalite'])
                                    ->setSituationMarital($row['situation_marital'])
                                    ->setSpecialite($row['specialite'])
                                    ->setGroupSangin($row['group_sangin'])
                                    ->setPaysOrigin($row['pays_origin'])
                                    ->setDateNaissance(new \DateTime($row['date_naissance']))
                                    ->setSituationProfessionnel($row['situation_professionnel'])
                                    ->setSexe($row['sexe']);
                                    $this->em->persist($personne);
                                break;
                            case 1:
                                $sante = (new Maladie())
                                        ->setNom($row['nom'])
                                        ->setEvacuation($row['evacuation'])
                                        ->setChirurgie($row['chirurgie'])
                                        ->setNomChirurgie($row['nomChirurgie'])
                                        ->setCoutDiagnostique($row['coutDiagnostique'])
                                        ->setcoutEvacuation($row['coutEvacuation'])
                                        ->setDateChirurgie($row['dateChirurgie'])
                                        ->setDateEvacuation($row['dateEvacuation'])
                                        ->setType($row['type'])
                                        ->setAnnee($row['annee'])
                                        ->setPersonne($personne);
                                    $this->em->persist($sante);
                                break;
                            case 2:
                                $education = (new Education())
                                        ->setEcole($row['ecole'])
                                        ->setClasse($row['classe'])
                                        ->setNiveau($row['niveau'])
                                        ->setDiplome($row['diplome'])
                                        ->setAnnee($row['annee'])
                                        ->setPersonne($personne);
                                    $this->em->persist($education);
                                break;
                            case 3:
                                $social = (new Social())
                                        ->setAllocationSolidaritePersonneAgee($row['allocationSolidaritePersonneAgee'])
                                        ->setProtectionMaladieEtMedicament($row['protectionMaladieEtMedicament'])
                                        ->setComplementaireSante($row['complementaireSante'])
                                        ->setAnnee($row['annee'])
                                        ->setPersonne($personne)
                                        ->setFinance($finance);
                                    $this->em->persist($social);
                                break;
                            case 4:
                                $logement = (new Logement())
                                        ->setProprietaire($row['proprietaire'])
                                        ->setAdressePermanente($row['adressePermanente'])
                                        ->setAdresseTemporaire($row['adresseTemporaire'])
                                        ->setVille($row['ville'])
                                        ->setCodePostale($row['codePostale'])
                                        ->setProvince($row['province'])
                                        ->setRegion($row['region'])
                                        ->setMaisonAllouer($row['maisonAllouer'])
                                        ->setAnnee($row['annee'])
                                        ->setPersonne($personne);
                                    $this->em->persist($logement);
                                break;
                            case 5:
                                $sport = (new Sport())
                                        ->setNom($row['nom'])
                                        ->setFrequence($row['frequence'])
                                        ->setLecture($row['lecture'])
                                        ->setAnnee($row['annee'])
                                        ->setPersonne($personne);
                                    $this->em->persist($sport);
                                break;
                            case 6:
                                $finance = (new Finance())
                                            ->setSalaire($row['salaire'])
                                            ->setLoyer($row['loyer'])
                                            ->setPrimeGratification($row['primeGratification'])
                                            ->setPersonne($personne);
                                    $this->em->persist($finance);
                                break;
                            case 7:
                                echo 'pas encore fait';
                                break;
                            case 8:
                                echo 'Pas encore fait';
                                break;
                            default:
                                echo 'autre document';
                        }
                        
                    }
                    $this->em->flush();
                }catch(FileException $e){

                }
                
            }else{
                $this->addFlash('error', 'Ce genre de fichier ne peux pas UPLOADER, veuillez inserer un fichier de type CSV');
            }

        }

        return $this->render('excel/index.html.twig', ['form' => $form->createView()]);

    }

}