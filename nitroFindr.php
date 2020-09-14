<?php

error_reporting(0);
set_time_limit(0);

echo "


███▄▄▄▄    ▄█      ███        ▄████████  ▄██████▄     ▄████████  ▄█  ███▄▄▄▄   ████████▄     ▄████████      
███▀▀▀██▄ ███  ▀█████████▄   ███    ███ ███    ███   ███    ███ ███  ███▀▀▀██▄ ███   ▀███   ███    ███      
███   ███ ███▌    ▀███▀▀██   ███    ███ ███    ███   ███    █▀  ███▌ ███   ███ ███    ███   ███    ███      
███   ███ ███▌     ███   ▀  ▄███▄▄▄▄██▀ ███    ███  ▄███▄▄▄     ███▌ ███   ███ ███    ███  ▄███▄▄▄▄██▀      
███   ███ ███▌     ███     ▀▀███▀▀▀▀▀   ███    ███ ▀▀███▀▀▀     ███▌ ███   ███ ███    ███ ▀▀███▀▀▀▀▀        
███   ███ ███      ███     ▀███████████ ███    ███   ███        ███  ███   ███ ███    ███ ▀███████████      
███   ███ ███      ███       ███    ███ ███    ███   ███        ███  ███   ███ ███   ▄███   ███    ███      
 ▀█   █▀  █▀      ▄████▀     ███    ███  ▀██████▀    ███        █▀    ▀█   █▀  ████████▀    ███    ███      
                             ███    ███                                                     ███    ███


By Smogeuh aka n00b1e

Twitter : twitter.com/n0_0b1e/
Github : https://github.com/n0ob1e/
Discord : NooБиe#0001

Laisse ce script tourner en fond, et profite de tes nitros ! :)


";

sleep(8);

$timeSleep = 5; // NE PAS METTRE UN TROP PETIT TIMESLEEP SOUS PEINE DE BAN PAR L'API !

if (is_int($timeSleep))
{
    function nitroFindr($timeSleep)
    {

        $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ123456789";
        $nitroGen = "";

        for ($i = 0;$i <= 15;$i++)
        {
            $newChar = $chars[rand(0, strlen($chars) - 1) ];
            $nitroGen .= $newChar;
        }

        $newChar = $chars[rand(0, strlen($chars) - 1) ];
        $lien = "https://discordapp.com/api/v6/entitlements/gift-codes/" . $nitroGen . "?with_application=false&with_subscription_plan=true";

        $reponse = file_get_contents($lien);
        $donnees = json_decode($reponse, true);

        if (!$reponse)
        {
            echo "[+] Le code : " . $nitroGen . ' n\'existe pas OU tu es ban par l\'API.' . "\n\n" .'[+]=[+] Savoir si je suis ban ? [+]=[+]' . "\n" . '[+] Rends toi sur l\'URL suivant et regarde si il y\'a marqué : "message": "You are being rate limited."' . "\n" . '[+] URL => https://discordapp.com/api/v6/entitlements/gift-codes/Am_I_Banned?' . "\n" . '[+] Si oui, essaie de mettre un timesleep plus grand ou de use des proxies !' . "\n\n";
        }
        elseif ($donnees['max_uses'] === 1)
        {
            echo "Bien vu le boss, voici ton nitro : https://discord.gift/" . $nitroGen . "\n";
            echo "Ton Nitro a été enregistré dans le fichier 'nitroRez.txt'.\n";
            echo "Type de plan : " . $donnees['subscription_plan']['name'] . "\n";
            if ($donnees['subscription_plan']['name'] === 999 || $donnees['subscription_plan']['name'] === 9999)
            {
                echo "Type de plan : Nitro Boost\n\n";
                file_put_contents("nitroRez.txt", "Bien vu le boss, voici ton nitro : https://discord.gift/" . $nitroGen . "\n" . "Type de plan : " . $donnees['subscription_plan']['name'] . "\n" . "Type de plan : Nitro Boost\n\n" , FILE_APPEND);
                
            }
            else
            {
                echo "Type de plan : Nitro Classic\n\n";
                file_put_contents("nitroRez.txt", "Bien vu le boss, voici ton nitro : https://discord.gift/" . $nitroGen . "\n" . "Type de plan : " . $donnees['subscription_plan']['name'] . "\n" . "Type de plan : Nitro classic\n\n" , FILE_APPEND);
                
            }
        }
        sleep($timeSleep);
    }
}
while (1)
{
    nitroFindr($timeSleep);
}
?>
