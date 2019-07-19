<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User;
        $user->username = '2fellows';
        $user->email = 'admin@2fellows.com';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('root');
        $user->tel = '00000000';
        $user->position = 'dev';
        $user->permission = 'super admin';
        $user->save();

        $user = new User;
        $user->username = 'nat2fellows';
        $user->email = 'nat@2fellows.com';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('admin');
        $user->tel = '00000000';
        $user->position = 'dev';
        $user->permission = 'super admin';
        $user->save();

        $user = new User;
        $user->username = 'max2fellows';
        $user->email = 'max@2fellows.com';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('admin');
        $user->tel = '00000000';
        $user->position = 'dev';
        $user->permission = 'admin';
        $user->save();


        $user = new User;
        $user->username = 'thipparat';
        $user->email = 'thipparat@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'orapan';
        $user->email = 'orapan@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'patchara';
        $user->email = 'patchara@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'suttipong';
        $user->email = 'suttipong@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'wanwimol';
        $user->email = 'wanwimol@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'wilaiwa';
        $user->email = 'wilaiwan@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'suttipong';
        $user->email = 'suttipong@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'wanwimol';
        $user->email = 'wanwimol@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'wilaiwan';
        $user->email = 'wilaiwan@nationalhealth.or.th ';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'wanvisa';
        $user->email = 'wanvisa@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'kathareeya';
        $user->email = 'kathareeya@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'ratthawan';
        $user->email = 'ratthawan@nationalhealth.or.th ';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'siriphen';
        $user->email = 'siriphen@nationalhealth.or.th ';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'thanyaporn';
        $user->email = 'thanyaporn@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'anusak';
        $user->email = 'anusak@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'jaruek';
        $user->email = 'jaruek@nationalhealth.or.th ';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'warittha';
        $user->email = 'warittha@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'wilairat';
        $user->email = 'wilairat@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'ketsarin';
        $user->email = 'ketsarin@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'pattharapong';
        $user->email = 'pattharapong@natioalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'tipicha';
        $user->email = 'tipicha@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'jutamart';
        $user->email = 'jutamart@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'napintorn';
        $user->email = 'napintorn@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'kanokwan';
        $user->email = 'kanokwan@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'rattana';
        $user->email = 'rattana@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'pisit';
        $user->email = 'pisit@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'chalalai';
        $user->email = 'chalalai@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'pakkanan';
        $user->email = 'pakkanan@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'tipicha';
        $user->email = 'tipicha@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'jutamart';
        $user->email = 'jutamart@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'napintorn';
        $user->email = 'napintorn@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'kanokwan';
        $user->email = 'kanokwan@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'rattana';
        $user->email = 'rattana@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'pisit';
        $user->email = 'pisit@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'chalalai';
        $user->email = 'chalalai@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'pakkanan';
        $user->email = 'pakkanan@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'nattaya';
        $user->email = 'nattaya@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'songpon';
        $user->email = 'songpon@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'nonglak';
        $user->email = 'nonglak@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'suwicha';
        $user->email = 'suwicha@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'wanpen';
        $user->email = 'wanpen@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'chavaleeporn';
        $user->email = 'chavaleeporn@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'yuvalak';
        $user->email = 'yuvalak@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'nantaporn';
        $user->email = 'nantaporn@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'nanyanat';
        $user->email = 'nanyanat@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'surachai';
        $user->email = 'surachai@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'promprasit';
        $user->email = 'promprasit@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'thanawan';
        $user->email = 'thanawan@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'nanoot';
        $user->email = 'nanoot@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'khanitta';
        $user->email = 'khanitta@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'oranit';
        $user->email = 'oranit@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'sanhakit';
        $user->email = 'sanhakit@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'prangtip';
        $user->email = 'prangtip@nationalhealth.or.th ';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'rattikarn';
        $user->email = 'rattikarn@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'niracha';
        $user->email = 'niracha@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'sirakan';
        $user->email = 'sirakan@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'chananchida';
        $user->email = 'chananchida@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'jiraporn';
        $user->email = 'jiraporn@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'somkiat';
        $user->email = 'somkiat@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'sirikorn';
        $user->email = 'sirikorn@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'sirithorn';
        $user->email = 'sirithorn@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'bandit';
        $user->email = 'bandit@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'chayada';
        $user->email = 'chayada@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'korarit';
        $user->email = 'korarit@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'techid';
        $user->email = 'techid@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'phontip';
        $user->email = 'phontip@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'jakkarin';
        $user->email = 'jakkarin@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'pranom';
        $user->email = 'pranom@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'rampaphun';
        $user->email = 'rampaphun@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'phruksa';
        $user->email = 'phruksa@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'thitima';
        $user->email = 'thitima@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'sunanta';
        $user->email = 'sunanta@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'nanthiya';
        $user->email = 'nanthiya@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'peeraporn';
        $user->email = 'peeraporn@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = '';
        $user->email = 'supsupapornaporn@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'napapohn';
        $user->email = 'napapohn@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'saijai';
        $user->email = 'saijai@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'thapaporn';
        $user->email = 'thapaporn@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'jinjutha766';
        $user->email = 'jinjutha766@gmail.com';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'kanjana_nre.nu';
        $user->email = 'kanjana_nre.nu@hotmail.com';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'weenus.nuy';
        $user->email = 'weenus.nuy@gmail.com';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'jiraporn9677';
        $user->email = 'jiraporn9677@gmail.com';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = '';
        $user->email = 'nuyuy.007@gmail.com';
        $user->email_verifinuyuy.007ed_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'aeaod_18';
        $user->email = 'aeaod_18@hotmail.com';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'julalak.man';
        $user->email = 'julalak.mang@gmail.com';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'noocat11';
        $user->email = 'noocat11@hotmail.com';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'winai_wongarsa';
        $user->email = 'winai_wongarsa@hotmail.co.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'kahlao';
        $user->email = 'kahlao@gmail.com';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'apilaphat';
        $user->email = 'apilaphat@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'anirut';
        $user->email = 'anirut@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'chalida';
        $user->email = 'chalida@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'pusadee';
        $user->email = 'pusadee@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'panatda';
        $user->email = 'panatda@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'suwanna';
        $user->email = 'suwanna@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'penthip';
        $user->email = 'penthip@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'sonthaya';
        $user->email = 'sonthaya@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'sukunlaya';
        $user->email = 'sukunlaya@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'pavpavineeinee';
        $user->email = 'pavpavineeinee@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'panujarus';
        $user->email = 'panujarus@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'phatchisuwa';
        $user->email = 'phatchisuwa@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'poonnapa';
        $user->email = 'poonnapa@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'jutatip';
        $user->email = 'jutatip@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'nopporn';
        $user->email = 'nopporn@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'kornkanok';
        $user->email = 'kornkanok@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'supawish';
        $user->email = 'supawish@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'nedwilai';
        $user->email = 'nedwilai@nationalhealth.or.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'somchaivir';
        $user->email = 'somchaivir@gmail.com';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'konc62';
        $user->email = 'konc62@yahoo.com';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'supachai.yava';
        $user->email = 'supachai.yava@gmail.com';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'ravadee.prasertcharoensuk';
        $user->email = 'ravadee.prasertcharoensuk@gmail.com';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'siriwattip';
        $user->email = 'siriwattip@gmail.com';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'ammorn';
        $user->email = 'ammorn@hotmail.com';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

        $user = new User;
        $user->username = 'prateep.d';
        $user->email = 'prateep.d@nhso.go.th';
        $user->email_verified_at = \Carbon\Carbon::now();
        $user->password = \Hash::make('NHCOadmin');
        $user->tel = '00000000';
        $user->position = 'officer';
        $user->permission = 'admin';
        $user->save();

    }
}
