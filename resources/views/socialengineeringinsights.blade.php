@extends('layouts.HeaderFooter')

@section('content')
<div class="mdk-header-layout__content page-content pb-0">
    <div class="py-32pt bg-gradient-primary">
        <div class="container d-flex flex-column flex-md-row align-items-center text-center text-md-left">
            <div class="flex mb-32pt mb-md-0">
                <h1 class="text-white mb-8pt">Social Engineering Insights</h1>
            </div>
        </div>
    </div>

    <div class="page-section">
        <div class="container page__container">
            <div class="page-headline text-center">
                <h2>How does Social Engineering work?</h2>
                <br><br>
                <div class="text-align-center">
                    <img class="img-social-engineering" src="{{ asset('assets/images/5-social-engineering-attacks.png') }}" style="width: 650px; height: 350px;">
                    <br><br><br>
                    <blockquote class="blockquote">
                        <p class="mb-0 text-align-SE">In a typical social engineering attack, a cybercriminal will communicate with the intended victim by saying they are from a trusted organization. In some cases, they will even impersonate a person the victim knows.</p><br>
                        <p class="mb-0 text-align-SE">If the manipulation works (the victim believes the attacker is who they say they are), the attacker will encourage the victim to take further action. This could be giving away sensitive information such as passwords, date of birth, or bank account details. Or they might encourage the victim to visit a website where malware is installed that can cause disruptions to the victim's computer. In worse case scenarios, the malicious website strips sensitive information from the device or takes over the device entirely.</p>
                    </blockquote>
                </div>

                <br><br>
                <div class="page-headline text-center">
                    <h2>Social Engineering Life Cycle</h2> 
                    <br><br>
                    <div class="text-align-center">
                        <img class="img-social-engineering" src="{{ asset('assets/images/social-engineering.png') }}" style="width: 650px; height: 400px;">
                        <br><br><br>
                        <blockquote class="blockquote">
                            <p class="mb-0 text-align-SE">The Social Engineering Life Cycle consists of the following steps:</p>
                            <ol class="text-align-SE">
                                <li><b>Investigation:</b> Identifying the victim, gathering information, and selecting attack methods, such as phishing emails or calls.</li>
                                <li><b>Hook:</b> Deceiving the victim to gain a foothold, for example, through phishing emails or fake job promotions.</li>
                                <li><b>Play:</b> Executing the attack and obtaining the victim's information, which may include spreading malware or ransomware.</li>
                                <li><b>Exit:</b> After a successful attack, the Social Engineer closes the interaction by removing all traces of malware and covering their tracks to avoid detection.</li>
                            </ol>
                        </blockquote>
                    </div>
                </div>

                <br><br>
                <div class="page-headline text-center">
                    <h2>Statistics around Social Engineering</h2>
                    <br><br>
                    <div class="text-align-center">
                        <img class="img-social-engineering" src="{{ asset('assets/images/stats2.png') }}" style="width: 650px; height: 300px;">
                        <br><br><br>
                        <blockquote class="blockquote">
                            <p class="mb-0 text-align-SE">1. Social Engineering Ranks #1 as the Top Attack Type in 2022 according to <a href="https://www.isaca.org/go/state-of-cybersecurity-2022">LookingGlass Cyber and ISACA (formerly the Information Systems Audit and Control Association).</a></p>
                            <p class="mb-0 text-align-SE">2. Social Engineering-Based Data Breaches Took 270 Days to Identify and Contain according to IBM. To identify the breaches (201 mean time days), and
                                to contain them (69 mean time days).</p>
                            <p class="mb-0 text-align-SE">3. 82% of Data Breaches Involve the "Human Element" according to the company called Verizon. The company shared in its<a href="https://www.verizon.com/business/resources/reports/dbir/"> 2022 Data Breach Investigations Report (DBIR) </a> that four in five of the breaches analyzed involved human-related factors.</p>
                            <p class="mb-0 text-align-SE">4. The average cost of a social engineering attack is around $130,000.</p>
                        </blockquote>
                    </div>
                </div>

                <br><br>
                <div class="page-headline text-center">
                    <h2>How does Social Engineering attacks affect students?</h2>
                    <br>
                    <div class="text-align-center">

                        <br>
                        <blockquote class="blockquote">
                            <p class="mb-0 text-align-SE"><b>1. Phishing and identity theft:</b> Social engineering attacks often involve phishing emails or messages that trick individuals into providing their personal information, such as usernames, passwords, or financial details. If students fall victim to such attacks, their sensitive information can be stolen and used for identity theft, leading to financial losses or other forms of misuse.</p><br>
                            <p class="mb-0 text-align-SE"><b>2. Academic fraud:</b> Social engineering attacks can be used to manipulate students into engaging in academic fraud. For example, an attacker may pose as a fellow student and persuade the target to share assignments, exams, or other coursework. This can lead to academic misconduct, disciplinary actions, and damage to the student's reputation.</p><br>
                            <p class="mb-0 text-align-SE"><b>3. Unauthorized access to accounts:</b> Through techniques like password guessing or social manipulation, attackers may gain unauthorized access to students' online accounts, including email, social media, or learning management systems. This can result in privacy breaches, misuse of personal information, or the spread of misinformation or offensive content using the compromised accounts.</p><br>
                            <p class="mb-0 text-align-SE"><b>4. Cyberbullying and harassment:</b> Social engineering attacks can be used as a means to initiate cyberbullying or harassment against students. Attackers may impersonate someone known to the target and use manipulative tactics to gain their trust, only to exploit it later for negative purposes. This can cause emotional distress, damage relationships, and impact the student's overall well-being.</p><br>
                            <p class="mb-0 text-align-SE"><b>5. Financial scams:</b> Students are often targeted with various financial scams through social engineering techniques. For instance, they may receive fraudulent offers for scholarships, internships, or job opportunities that require upfront payments or personal information. Falling for such scams can result in financial loss and disappointment.</p>
                        </blockquote>
                    </div>
                </div>

                <br><br>

                <div class="page-headline text-center">
                    <h2>Types of Social Engineering Attacks</h2>
                    <br>
                    <div class="text-align-center">
                        <br>
                        <blockquote class="blockquote">
                            <p class="mb-0 text-align-SE"><b>1. Phishing</b></p><br>
                            <p class="mb-0 text-align-SE">Phishing is the most common type of social engineering attack. At a high level, most phishing scams aim to accomplish three things:</p>
                            <ul>
                                <li class="text-align-SE">Obtain personal information such as names, addresses, and Social Security Numbers;</li>
                                <li class="text-align-SE">Use shortened or misleading links that redirect users to suspicious websites that host phishing landing pages; and</li>
                                <li class="text-align-SE">Leverage fear and a sense of urgency to manipulate the user into responding quickly.</li>
                            </ul>
                            <p class="mb-0 text-align-SE">No two phishing emails are the same. There are at least six different sub-categories of phishing attacks. Beyond that, we all know that phishers invest varying amounts of time crafting their attacks. Hence why there are so many phishing messages with spelling and grammar errors.</p>
                            <br>
                            <p class="mb-0 text-align-SE"><b>2. Pretexting</b></p><br>
                            <p class="mb-0 text-align-SE">Pretexting is another form of social engineering where attackers focus on creating a pretext, or a fabricated scenario, that they can use to steal someone’s personal information. In these attacks, the scammer usually impersonates a trusted entity/individual and says they need specific details from a user to confirm their identity. If the victim complies, the attackers commit identity theft or use the data to conduct other malicious activities. More advanced pretexting involves tricking victims into doing something that circumvents the organization’s security policies.</p><br>

                            <p class="mb-0 text-align-SE">Many threat actors who engage in pretexting will masquerade as HR personnel or finance employees to target C-Level executives. As reported by KrebsOnSecurity, others spoof banks and use SMS-based text messages about suspicious transfers to call up and scam anyone who responds.</p><br>

                            <p class="mb-0 text-align-SE"><b>3. Baiting</b></p><br>
                            <p class="mb-0 text-align-SE">Baiting is, in many ways, like phishing.</p><br>
                            <p class="mb-0 text-align-SE">The difference is that baiting uses the promise of an item or good to entice victims. For example, baiting attacks may leverage the offer of free music or movie downloads to trick users into handing in their login credentials. Alternatively, they can try to exploit human curiosity via the use of physical media.</p><br>
                            <p class="mb-0 text-align-SE">As computers shun the CD drive in the modern era, attackers modernize their approach by trying USB keys. A controlled experiment performed by the University of Michigan, the University of Illinois, and Google revealed that a staggering 45-98% of people let curiosity get the best of them, plugging in USB drives that they find.</p>
<br>
                            <p class="mb-0 text-align-SE"><b>4. Quid Pro Quo</b></p><br>
                            <p class="mb-0 text-align-SE">Like baiting, quid pro quo attacks promise something in exchange for information. This benefit usually assumes the form of a service, whereas baiting usually takes the form of a good.</p>
<br>
                            <p class="mb-0 text-align-SE"><b>5. Tailgating</b></p><br>
                            <p class="mb-0 text-align-SE">Our penultimate social engineering attack type is known as “tailgating.” In these attacks, someone without the proper authentication follows an authenticated employee into a restricted area.</p>
                        </blockquote>
                    </div>

                </div>


            </div>
        </div>
    </div>
</div>
@endsection