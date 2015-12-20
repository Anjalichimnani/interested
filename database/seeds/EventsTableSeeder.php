<?php

use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $user_id = \Interested\User::where('name','=','Jill')->pluck('id');
        $event = new \Interested\Event();
        $event->name = 'Intermediate Excel Tips & Tricks';
        $event->description = 'Volunteer nights are a valuable chance for supporters to contribute to the work of Partners In Health, and to discuss current issues in the field of global health & social justice. A typical volunteer night involves making thank you calls to new PIH supporters, and participating in a discussion with PIH staff members. This month, we will focus on our current advocacy efforts and hear from the PIH Engage team. All are welcome -- no previous experience or knowledge of PIH is necessary. We look forward to meeting you, and hope you will bring a friend or two!';
        $event->image_url = 'http://img1.meetupstatic.com/img/94156887029318281691566697/logo.svg';
        $event->link = 'www.sojust.org';
        $event->presenter = 'Stephany George';
        $event->date_on = '2015-07-12';
        $event->time_at = '18:00:00';
        $event->venue = 'The NonProfit Center is located one block from South Station at 89 South Street. The Center is physically accessible through the main lobby.';
        $event->amount = '20';
        $event->user_id = $user_id;
        $event->save();

        $user_id = \Interested\User::where('name','=','Jill')->pluck('id');
        $event = new \Interested\Event();
        $event->name = 'Volunteer Night at Partners In Health';
        $event->description = 'Volunteer nights are a valuable chance for supporters to contribute to the work of Partners In Health, and to discuss current issues in the field of global health & social justice. A typical volunteer night involves making thank you calls to new PIH supporters, and participating in a discussion with PIH staff members. This month, we will focus on our current advocacy efforts and hear from the PIH Engage team. All are welcome -- no previous experience or knowledge of PIH is necessary. We look forward to meeting you, and hope you will bring a friend or two!';
        $event->image_url = 'https://donate.pih.org/page/-/img/header-logo.png';
        $event->link = 'http://act.pih.org/page/s/boston-pih-volunteer-night';
        $event->presenter = 'Team at Partners in Health';
        $event->date_on = '2015-08-12';
        $event->time_at = '18:00:00';
        $event->venue = '888 Commonwealth Ave 3rd Floor Boston, MA 02215';
        $event->amount = '0';
        $event->user_id = $user_id;
        $event->save();

        $user_id = \Interested\User::where('name','=','Jamal')->pluck('id');
        $event = new \Interested\Event();
        $event->name = 'State of Student Privacy';
        $event->description = 'The Berkman Centers Student Privacy Initiative team will do a deep dive into the 1.0 and 2.0 privacy conversations that have been dominating the student privacy and educational technologies (“ed tech”) landscape over the past three years. The 1.0 strand of inquiry has examined privacy concerns related to the interactions between governmental entities (K-12 public schools) and third-party services (from commercial ed tech vendors), with a focus on data collection, consent, and security.';
        $event->image_url = 'https://cyber.law.harvard.edu/sites/cyber.law.harvard.edu/themes/berkman/images/logo.png';
        $event->link = 'https://cyber.law.harvard.edu/events/luncheon/2015/12/StudentPrivacy';
        $event->presenter = 'Paulina Haduong and Leah A. Plunkett';
        $event->date_on = '2015-08-12';
        $event->time_at = '12:00:00';
        $event->venue = 'Berkman Center for Internet & Society at Harvard University Harvard Law School campus, Wasserstein Hall, Room 2004';
        $event->amount = '30';
        $event->user_id = $user_id;
        $event->save();
    }
}
