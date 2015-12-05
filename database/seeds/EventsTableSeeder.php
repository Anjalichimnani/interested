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
        DB::table('events')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Intermediate Excel Tips & Tricks',
            'description' => 'This session caters to Microsoft Excel users who are proficient in the basics, and are ready to extend their knowledge and skills beyond creating simple workbooks. It is designed to improve users’ productivity within Excel, including techniques to achieve quick results and create more efficient workbooks that are easier to maintain. After a quick refresher of some basics, we will cover intermediate level skills such as charts (what type to use when), conditional formatting, using lookup/match/if functions, hyperlinks, and fancy formulas.',
            'link' => 'www.sojust.org',
            'presenter' => 'Stephany George',
            'date_on' => '2015-07-12',
            'time_at' => '18:00:00',
            'venue' => 'The NonProfit Center is located one block from South Station at 89 South Street. The Center is physically accessible through the main lobby.',
            'amount' => '20',
        ]);

        DB::table('events')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'Volunteer Night at Partners In Health',
            'description' => 'Volunteer nights are a valuable chance for supporters to contribute to the work of Partners In Health, and to discuss current issues in the field of global health & social justice. A typical volunteer night involves making thank you calls to new PIH supporters, and participating in a discussion with PIH staff members. This month, we will focus on our current advocacy efforts and hear from the PIH Engage team. All are welcome -- no previous experience or knowledge of PIH is necessary. We look forward to meeting you, and hope you will bring a friend or two!',
            'link' => 'http://act.pih.org/page/s/boston-pih-volunteer-night',
            'presenter' => 'Team at Partners in Health',
            'date_on' => '2015-08-12',
            'time_at' => '18:00:00',
            'venue' => '888 Commonwealth Ave 3rd Floor Boston, MA 02215',
            'amount' => '0',
        ]);

        DB::table('events')->insert([
            'created_at' => Carbon\Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon\Carbon::now()->toDateTimeString(),
            'name' => 'State of Student Privacy',
            'description' => 'The Berkman Centers Student Privacy Initiative team will do a deep dive into the 1.0 and 2.0 privacy conversations that have been dominating the student privacy and educational technologies (“ed tech”) landscape over the past three years. The 1.0 strand of inquiry has examined privacy concerns related to the interactions between governmental entities (K-12 public schools) and third-party services (from commercial ed tech vendors), with a focus on data collection, consent, and security.',
            'link' => 'https://cyber.law.harvard.edu/events/luncheon/2015/12/StudentPrivacy',
            'presenter' => 'Paulina Haduong and Leah A. Plunkett',
            'date_on' => '2015-08-12',
            'time_at' => '12:00:00',
            'venue' => 'Berkman Center for Internet & Society at Harvard University Harvard Law School campus, Wasserstein Hall, Room 2004',
            'amount' => '30',
        ]);
    }
}
