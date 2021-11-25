<?php

namespace App\DataFixtures;

use App\Entity\User;
use App\Entity\Product;
use App\Entity\Order;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        # Création des User
        $userAdmin = new User();
        $userAdmin->setName('Admin')->setFirstname('Admin')->setEmail('admin@gmail.com')->setAddress('124 avenue Flandres')->setPhone(0622334455)->setPassword('admin1234');

        $user1 = new User();
        $user1->setName('Dupont')->setFirstname('Emeline')->setEmail('e.dupont@gmail.com')->setAddress('34 Rue Monte Bello')->setPhone(0611223344)->setPassword('emeline1234');

        $user2 = new User();
        $user2->setName('Dubois')->setFirstname('Lucas')->setEmail('l.duboist@gmail.com')->setAddress('174 rue du Four')->setPhone(0644556677)->setPassword('lucas1234');

        $user3 = new User();
        $user3->setName('Leblanc')->setFirstname('Florian')->setEmail('f.leblanc@gmail.com')->setAddress('14 rue Paradis')->setPhone(0714556647)->setPassword('florian1234');


        # Création des Product
        $product1 = new Product();
        $product1->setName('Barry White')->setImage("https://www.wish.com/product/5f5065d48398060a4098f4a9?hide_login_modal=true&from_ad=goog_shopping&_display_country_code=FR&_force_currency_code=EUR&pid=googleadwords_int&c=%7BcampaignId%7D&ad_cid=5f5065d48398060a4098f4a9&ad_cc=FR&ad_lang=EN&ad_curr=EUR&ad_price=46.00&campaign_id=12686188704&retargeting=true&gclid=Cj0KCQiAhf2MBhDNARIsAKXU5GRjwIZF_yceTC0-Tz_QHHKrhByQtoUK3CXrMEx6mszkSj6mUtlnyBkaAvhnEALw_wcB&share=web")->setPrice(450)->setSize(42)->setModel('Patins artistique')->setDescription('');

        $product2 = new Product();
        $product2->setName('Madonna')->setImage("https://www.wish.com/product/5f5065d48398060a4098f4a9?hide_login_modal=true&from_ad=goog_shopping&_display_country_code=FR&_force_currency_code=EUR&pid=googleadwords_int&c=%7BcampaignId%7D&ad_cid=5f5065d48398060a4098f4a9&ad_cc=FR&ad_lang=EN&ad_curr=EUR&ad_price=46.00&campaign_id=12686188704&retargeting=true&gclid=Cj0KCQiAhf2MBhDNARIsAKXU5GRjwIZF_yceTC0-Tz_QHHKrhByQtoUK3CXrMEx6mszkSj6mUtlnyBkaAvhnEALw_wcB&share=web")->setPrice(178)->setSize(38)->setModel('Roller derby')->setDescription('');

        $product3 = new Product();
        $product3->setName('Carmen')->setImage("https://www.smallable.com/fr/product/roller-bleu-pale-impala-rollerskates-201093?country=FR&currency=EUR&esl-k=sem-google-fr-fr%7Cnu%7Cc431808256938%7Cm%7Ck%7Cp%7Ct%7Cdc%7Ca102038696362%7Cg9896107617&gdpr=%7BGDPR%7D&gdpr_consent=%7BGDPR_CONSENT_413%7D&gdpr_pd=%7BGDPR_PD%7D&gclid=Cj0KCQiAhf2MBhDNARIsAKXU5GSsxyea8JJZyhAY-VFcHWIZtnx5_uTDPKPK1ianCCYqS7Zjo-YZhjIaAlFkEALw_wcB")->setPrice(200)->setSize(40)->setModel('Roller street')->setDescription('');

        
        # Création des Order
        $order1 = new Order();
        $order1->setDate(new \DateTime())->setStatus(true)->setTotal(820)->setUser($user1);

        $order2 = new Order();
        $order2->setDate(new \DateTime())->setStatus(true)->setTotal(840)->setUser($user2);

        $order3 = new Order();
        $order3->setDate(new \DateTime())->setStatus(true)->setTotal(450)->setUser($user3);


        
        # Je souhaite sauvegarder dans ma BDD les User
        $manager->persist( $userAdmin );
        $manager->persist( $user1 );
        $manager->persist( $user2 );
        $manager->persist( $user3 );

        # Je souhaite sauvegarder dans ma BDD les Product
        $manager->persist( $product1 );
        $manager->persist( $product2);
        $manager->persist( $product3 );

        # Je souhaite sauvegarder dans ma BDD les Order
        $manager->persist( $order1);
        $manager->persist( $order2 );
        $manager->persist( $order3 );


        # J'execute ma requete d'enregistrement
        $manager->persist( $userAdmin );
        $manager->persist( $user1 );
        $manager->persist( $user2 );
        $manager->persist( $user3 );
        $manager->flush();
    }
}
