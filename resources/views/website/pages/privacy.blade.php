@extends('layouts.web_main')
@section('css')
<style>
    p {
        color: white;
        font-size: 18px;
        line-height: 30px;
    }

    .title-text1 {
        text-decoration: underline;
    }

    h4 {
        color: white;
        font-weight: bold;
    }

    ol>li {
        color: white;
    }


    ul>li {
        color: white;
    }

    h5 {
        color: white;
    }
</style>
@section('content')

<!-- Faqs Content Starts Here -->
<section class="pad-top-80 pad-bot-60 bg-sec1">
    <div class="container">
        <div class="block-element text-center m-b-50 wow fadeInUp" data-wow-delay="0.3s">
            <h3 class="title-text1"> Privacy Policy </h3>
        </div>

        <div class="row">
            <div class="col-md-12">
                <p>
                    This notice describes the privacy policy (“Privacy Policy” or “Policy”) of <a href="https://easyseo.ai/">https://easyseo.ai/</a>
                    (hereinafter referred to
                    as the “website” or “Platform”) which is operated by: <br>
                    Company Name: Branda Stock Ltd. <br>
                    Registered Office: Hadvir 18, Hadera – 3848891 (Israel) <br>
                    (here simply referred to as “Easyseo.ai” or “us” or “our” or “we”). In this Policy, you shall be
                    referred as “you” or
                    “your” or “user” or “users”.
                </p>

                <p>
                    This Privacy Policy explains what information of yours will be collected by us when you access the
                    website or make
                    the payment or use our services, how the information will be used, and how you can control the
                    collection, correction,
                    and/or deletion of the information. We will not knowingly use or share your information with anyone,
                    except as
                    described in this Privacy Policy. The use of information collected by us shall be limited to the
                    purposes described
                    under this Privacy Policy and our Terms of Service
                </p>

                <p>
                    By using our Site or providing your personal information to us, you are accepting and consenting to
                    the practices
                    described in this policy. Please note that this includes consenting to the processing of any
                    personal information that
                    you provide, as described below.
                </p>

                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="col-md-6">
                        <div class="table-responsive">
                            <center>
                                <h4>
                                    TABLE OF CONTENT
                                </h4>
                            </center>

                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>Sr. No</th>
                                        <th>Particular</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            1.
                                        </td>
                                        <td>
                                           <a href="#point-1">What information about the users do we collect?</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            2.
                                        </td>
                                        <td><a href="#point-2">Lawful basis for processing personal information</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            3.
                                        </td>
                                        <td>
                                            <a href="#point-3">How do we use this information?</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            4.
                                        </td>
                                        <td>
                                            <a href="#point-4">Deleting your information</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            5.
                                        </td>
                                        <td>
                                            <a href="#point-5">Cookie Policy</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            6.
                                        </td>
                                        <td>
                                            <a href="#point-6">Sharing of information</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            7.
                                        </td>
                                        <td>
                                            <a href="#point-7">Storage and Security of Information</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            8.
                                        </td>
                                        <td>
                                            <a href="#point-8">Links to third party Apps</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            9.
                                        </td>
                                        <td>
                                            <a href="#point-9">Rights of EU, EEA, and UK users</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            10.
                                        </td>
                                        <td>
                                            <a href="#point-10">California Resident Rights</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            11.
                                        </td>
                                        <td>
                                            <a href="#point-11">Notice for Nevada Residents</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            12.
                                        </td>
                                        <td>
                                            <a href="#point-12">Rights of Data Subjects from Israel and other Jurisdictions</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            13.
                                        </td>
                                        <td>
                                            <a href="#point-13">How do we respond to legal requests?</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            14.
                                        </td>
                                        <td>
                                            <a href="#point-14">Children Privacy</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            15.
                                        </td>
                                        <td>
                                            <a href="#point-15">How can I withdraw my consent? (OPT-OUT)</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            16.
                                        </td>
                                        <td>
                                            <a href="#point-16">Governing law and Dispute Resolution</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            17.
                                        </td>
                                        <td>
                                            <a href="#point-17">Do you have questions or concerns about this Privacy Policy?</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            18.
                                        </td>
                                        <td>
                                            <a href="#point-18"> Updates to this Policy</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            19.
                                        </td>
                                        <td>
                                            <a href="#point-19"> Welcoming of Suggestions </a>
                                        </td>
                                    </tr>
                                </tbody>

                            </table>
                        </div>
                    </div>
                    <div class="col-md-3"></div>
                </div>


                <ol>
                    <li style="font-size:18px;" id="point-1">
                        What information about the users do we collect?
                        <ol type="a">
                            <li>
                                <strong>Personal Information that you provide us</strong>: We collect the information
                                you provide when you use our Site or
                                our services, including without limitation, when you sign up for an account, make the
                                payment to purchase any
                                of our paid subscription plans, use our services for creating content or checking the
                                SEO score, share your
                                feedback, submit a complaint, communicate, or interact with us in any manner. This
                                includes your first name,
                                last name, email, phone number, address, state, province, zip/postal code, city, and
                                usage data.
                            </li>
                            <li>
                                <strong>Content that you create or upload</strong>: We collect the content that you
                                upload on the platform, and the content
                                that you create using our services. Moreover, you are free to move or delete the content
                                from our platform at
                                any time at your sole discretion.
                            </li>
                            <li>
                                <strong>Information about your Activities</strong>: We may also collect information
                                about how you use our services, such as
                                the content you engage with, tools that you use, or the frequency and duration of your
                                activities.
                            </li>
                            <li>
                                <strong>Information that we collect when you use the website</strong>: We may also
                                collect information while you access,
                                browse, or view the Site. In other words, when you access the website, we may be aware
                                of your usage of the
                                website, and gather, collect, and record the information relating to such usage,
                                operating system, make & ID,
                                device ID and type, settings and characteristics, Site crashes, identifiers associated
                                with cookies or other
                                technologies that may uniquely identify a device. This helps us in providing our
                                services to the users and making
                                improvements in the services, fixing errors and bugs.
                            </li>
                            <li>
                                <strong>Customer Care</strong>: If you contact our customer support via emails, in those
                                cases, we collect all your interactions
                                with our customer support.
                            </li>
                            <li>
                                <strong>Information that we collect from Facebook and Google</strong>: You can sign-up
                                or login on our platform through
                                your Google and/or Facebook accounts. When you do this, you allow us to have access to
                                certain information
                                from your Google and/or Facebook accounts based upon your privacy preference settings.
                            </li>
                            <li>
                                <strong>Payment Information</strong>: When you subscribe to one of our plans, then you
                                provide our third-party payment
                                service provider, namely, PayProGlobal, with your credit or debit card information. We
                                don’t collect your
                                payment card details. For payments, we redirect you to PayProGlobal, which collects and
                                processes your
                                payment request. You can find the privacy policy of PayProGlobal on this <a
                                    href="https://docs.payproglobal.com/documents/legal/privacyPolicy.pdf">link</a>.
                            </li>
                            <li>
                                <strong>Good Judgment</strong>: We suggest that you exercise good judgment and caution
                                while providing your personal
                                information.
                            </li>
                        </ol>
                    </li>
                    <li style="font-size:18px;" id="point-2">
                        What is the lawful basis for which we use your personal information?
                        <p>
                            You hereby acknowledge that all processing of your personal information will be justified by
                            a "lawful ground" for
                            processing. In most cases, processing will be justified on the basis that
                        </p>
                        <ul>
                            <li>
                                <strong>Consent</strong>: You have given your consent for processing personal data for
                                one or more specific purposes.
                            </li>
                            <li>
                                <strong>Performance of a contract</strong>: Provision of personal data is necessary for
                                the performance of an agreement
                                with you and/or for any pre-contractual obligations thereof.
                            </li>
                            <li>
                                <strong>Legal obligations</strong>: Processing personal data is necessary for compliance
                                with a legal obligation to which we
                                are subject
                            </li>
                            <li>
                                <strong>Legitimate interests</strong>: Processing personal data is necessary for the
                                purposes of the legitimate interests
                                pursued by the Easyseo.ai.
                            </li>
                        </ul>
                        <p>
                            In any case, we will gladly help to clarify the specific legal basis that applies to the
                            processing, and in particular
                            whether the provision of personal data is a statutory or contractual requirement, or a
                            requirement necessary to enter
                            into a contract. Feel free to contact us for this purpose at <a
                                href="mailto:support@easyseo.ai">support@easyseo.ai</a>
                        </p>
                    </li>
                    <li style="font-size:18px;" id="point-3">
                        How do we use this information?
                        <p>
                            We use all the information we have to help us provide, support and improve our services. We
                            use the information
                            collected from you for one or more of the following purposes:
                        </p>
                        <ol type="a">
                            <li>
                                To create and update your account.
                            </li>
                            <li>
                                To provide you the services requested by you;
                            </li>
                            <li>
                                To enable you to create content and check the SEO score;
                            </li>
                            <li>
                                To process your payments;
                            </li>
                            <li>
                                To notify you about the subscription renewal;
                            </li>
                            <li>
                                To assess queries, requirements, and process requests for various services;
                            </li>
                            <li>
                                To process your cancellation request;
                            </li>
                            <li>
                                To improve our Site and services;
                            </li>
                            <li>
                                To be able to deliver our services, personalize content, and make suggestions for you by
                                using this
                                information to understand how you use and interact with our services and the people or
                                things you are
                                connected to and interested in on and off our services.
                            </li>
                            <li>
                                We use your information to send you marketing communications, newsletter, communicate
                                with you about
                                our services and let you know about our policies and terms. We also use your information
                                to respond to you
                                when you contact us.
                            </li>
                            <li>
                                We also use your information to ensure our services are working as intended, such as
                                tracking outages or
                                troubleshooting issues that you report to us. And we use your information to make
                                improvements to our
                                services
                            </li>
                            <li>
                                We use information to help improve the safety and reliability of our services. This
                                includes detecting,
                                preventing, and responding to fraud, abuse, security risks, and technical issues that
                                could harm Easyseo.ai,
                                our community, or the public.
                            </li>
                            <li>
                                To respond to summons, court orders, directions, or other judicial processes.
                            </li>
                            <li>
                                To provide information to law enforcement agencies or in connection with an
                                investigation on matters related
                                to public safety.
                            </li>
                        </ol>
                    </li>
                    <li style="font-size:18px;" id="point-4">
                        Deleting your information
                        <p>
                            Your account and the information that you provide us is yours. You can at any time delete
                            the same. However, you
                            acknowledge that we may also retain some of the information so deleted for a reasonable
                            period of time in order to
                            comply with legal requests. You can request us to delete your information by writing to us
                            at <a href="mailto:support@easyseo.ai.">support@easyseo.ai.</a>
                        </p>
                    </li>
                    <li style="font-size:18px;" id="point-5">
                        Cookies and Similar Technologies
                        <p>
                            Cookies are bits of electronic information that a website may transfer to a visitor’s
                            computer to identify specific
                            information about the visitor’s visits to other websites. We may use automated technologies
                            including the use of web
                            server logs to collect IP addresses, device details, cookies and web beacons. The website
                            uses a browser feature known
                            as a cookie, which assigns a unique identification to your computer. However, in case you do
                            not wish for us to collect
                            such information, simply change the cookie settings on your web browser. For more
                            information, please refer to our
                            Cookie Policy posted on the website.
                        </p>
                    </li>
                    <li style="font-size:18px;" id="point-6">
                        Sharing of Information
                        <ol type="a">
                            <li>
                                We may share some of your input data (which may also contain your personal as well as
                                non-personal
                                information) with <a href="https://openai.com/">OpenAI</a>, which is our third-party
                                service provider. You can find their
                                privacy policy <a href="https://openai.com/policies/privacy-policy">here</a>
                                (external link).
                            </li>
                            <li>
                                When you subscribe to one of our plans, then you provide our third-party payment service
                                provider, namely,
                                PayProGlobal, with your credit or debit card information. We don’t collect your payment
                                card details. For
                                payments, we redirect you to PayProGlobal, which collects and processes your payment
                                request. You can
                                find the privacy policy of PayProGlobal on this <a
                                    href="https://docs.payproglobal.com/documents/legal/privacyPolicy.pdf">link</a>.
                            </li>
                            <li>
                                We may share your information with some of our employees and contractors to process your
                                requests, and
                                to respond to you. We will have the necessary non-disclosure agreements in place with
                                such employees and
                                contractors to protect your information.
                            </li>
                            <li>
                                We may also share your personal as well as non-personal information with the following
                                other third-party
                                service providers:

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Sr.No.
                                                </th>
                                                <th>
                                                    NAME
                                                </th>
                                                <th>
                                                    REASON FOR SHARING
                                                </th>
                                                <th>
                                                    LINK TO PRIVACY POLICY
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>
                                                    1)
                                                </td>
                                                <td>
                                                    GitHub
                                                </td>
                                                <td>
                                                    To automate the development process of our
                                                    service
                                                </td>
                                                <td>
                                                    <a href="https://docs.github.com/en/site-policy/privacy-policies/github-privacy-statement">Link</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    2)
                                                </td>
                                                <td>
                                                    Google Analytics
                                                </td>
                                                <td>
                                                    To monitor and analyze the use of our service.
                                                </td>
                                                <td>
                                                    <a href="https://policies.google.com/privacy?hl=en">Link</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    3)
                                                </td>
                                                <td>
                                                    Firebase
                                                </td>
                                                <td>
                                                    To store and manage user data, as well as to
                                                    enhance the security and reliability of the
                                                    platform.
                                                </td>
                                                <td>
                                                    <a href="https://policies.google.com/privacy?hl=en">Link</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    4)
                                                </td>
                                                <td>
                                                    Mixpanel
                                                </td>
                                                <td>
                                                    To analyze user behavior and gather insights to
                                                    improve the platform's performance and user
                                                    experience.
                                                </td>
                                                <td>
                                                    <a href="https://mixpanel.com/legal/privacy-policy">Link</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    5)
                                                </td>
                                                <td>
                                                    Twilio Segment
                                                </td>
                                                <td>
                                                    To manage and streamline customer data across
                                                    various platforms and tools for better customer
                                                    engagement and analysis
                                                </td>
                                                <td>
                                                    <a href="https://www.twilio.com/en-us/legal/privacy">Link</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    6)
                                                </td>
                                                <td>
                                                    Google Ads
                                                </td>
                                                <td>
                                                    To manage and optimize ad campaigns for
                                                    clients, and to provide targeted and effective
                                                    advertising solutions.
                                                </td>
                                                <td>
                                                    <a href="https://policies.google.com/privacy?hl=en">Link</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    7)
                                                </td>
                                                <td>
                                                    Facebook
                                                </td>
                                                <td>
                                                    For Facebook marketing and ads.
                                                </td>
                                                <td>
                                                    <a href="https://www.facebook.com/privacy/policy">Link</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    8)
                                                </td>
                                                <td>
                                                    Twitter
                                                </td>
                                                <td>
                                                    For Twitter marketing and ads.
                                                </td>
                                                <td>
                                                    <a href="https://twitter.com/en/privacy">Link</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    9)
                                                </td>
                                                <td>
                                                    LinkedIn
                                                </td>
                                                <td>
                                                    For LinkedIn marketing and ads.
                                                </td>
                                                <td>
                                                    <a href="https://twitter.com/en/privacy">Link</a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>
                                                    10)
                                                </td>
                                                <td>
                                                    TikTok
                                                </td>
                                                <td>
                                                    For TikTok marketing and ads.
                                                </td>
                                                <td>
                                                    <a
                                                        href="https://www.tiktok.com/legal/page/row/privacy-policy/en">Link</a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </li>
                            <li>
                                We keep your information safe and do not share your information with any other third
                                party. However, if we
                                merge with or are acquired by another company or we sell our website or business unit,
                                or if all or a substantial
                                portion of our assets are acquired by another company, in those cases, your information
                                will likely be one of
                                the assets that would be transferred
                            </li>
                            <li>
                                We may also share your information in response to legal requests. Please refer to
                                Section 13
                            </li>
                        </ol>
                    </li>
                    <li style="font-size:18px;" id="point-7">
                        Storage and Security of Information
                        <ol type="a">
                            <li>
                                Storage: Your data is stored through our hosting service provider’s data storage,
                                databases, and servers. We
                                also store some of the information collected by us on our secured computers and cloud
                                servers and do not
                                share it with any third party, except for the limited purposes as mentioned in the
                                Section 6. The servers and
                                databases in which information may be stored may be located outside the country from
                                which you accessed
                                this Site, and in a country where the data protection and other laws may differ (and be
                                less stringent) from
                                your country of residence. You hereby consent to any such cross-border transfer of your
                                personal
                                information.
                            </li>
                            <li>
                                Retention: Personal information that we collect, access or process will be retained only
                                so long as necessary
                                for the fulfillment of the purposes for which it was collected, as necessary for our
                                legitimate business
                                purposes, or as required or authorized by law. Personal information that is no longer
                                required to fulfill the
                                identified purposes will be destroyed, erased, or made de-identified or anonymous.
                            </li>
                            <li>
                                Steps taken by us to protect your data: We regularly take the following steps to protect
                                the integrity of
                                your information:
                                <ul>
                                    <li>
                                        We protect the security of your information while it is being transmitted by
                                        using secure connection;
                                    </li>
                                    <li>
                                        We use computer safeguards such as firewalls to keep this data safe;
                                    </li>
                                    <li>
                                        We only authorize access to employees and trusted partners who need it to carry
                                        out their
                                        responsibilities;
                                    </li>
                                    <li>
                                        We regularly monitor our systems for possible vulnerabilities and attacks, and
                                        we carry out
                                        penetration testing to identify ways to further strengthen security; and
                                    </li>
                                    <li>
                                        We will ask for proof of identity before we share your personal data with you.
                                    </li>
                                </ul>
                            </li>
                            <li>
                                Security: We employ reasonable security practices to ensure that the information is safe
                                and secure with us.
                                However, no information on the internet is 100% safe, and you accept and acknowledge
                                such risk. Also, we
                                will disclose the information so collected for limited purposes as mentioned in this
                                Privacy Policy.
                            </li>
                        </ol>
                    </li>
                    <li style="font-size:18px;" id="point-8">
                        Links to other Sites
                        <p>
                            The Site may contain links to third-party websites and online services that are not owned or
                            controlled by us. We have
                            no control over, and assume no responsibility for such websites and online services. Be
                            aware when you leave the
                            website; we suggest you read the terms and privacy policy of each third-party website, and
                            online service that you visit.
                        </p>
                    </li>
                    <li style="font-size:18px;" id="point-9">
                        Rights of EU, EEA, and UK users
                        <p>
                            This section of the Policy supplements the other provisions of this Privacy Policy, and
                            applies to you if you are in the
                            EU, the European Economic Area (EEA) or UK. For the purposes of GDPR, your DATA CONTROLLER
                            for the
                            data collected by us to provide you with our services is:
                            Company Name: Branda Stock Ltd.
                            Registered Office: Hadvir 18, Hadera – 3848891 (Israel)

                        </p>

                        <p>
                            ALL YOUR USER INFORMATION WILL BE COLLECTED, STORED, PROCESSED AND SHARED
                            STRICTLY IN ACCORDANCE, IN LINE AND FULL COMPLIANCE WITH REGULATION (EU) 2016/679
                            (SIMPLY CALLED “GDPR”), DIRECTIVE 2002/58/EC (SIMPLY CALLED “E-PRIVACY DIRECTIVE,
                            2002”) OF THE EUROPEAN PARLIAMENT AND OF THE COUNCIL, AND UK’S DATA PROTECTION
                            ACT 2018 (HERINAFTER COLLECTIVELY REFERRED TO AS THE “EU REGULATION”).
                        </p>

                        <p>
                            Data Protection Officer (DPO): Deeve (<a
                            href="mailto:support@easyseo.ai">support@easyseo.ai</a>)
                        </p>

                        <p>
                            Under applicable GDPR, you have the following rights in respect of your personal
                            information:
                        </p>

                        <ul>
                            <li>
                                Right to obtain information: to obtain information about how and on what basis your
                                personal information
                                is processed and to obtain a copy;
                            </li>
                            <li>
                                Right to rectification: You have the right to have any incomplete or inaccurate
                                information we hold about
                                you rectified and corrected.
                            </li>
                            <li>
                                Right of Erasure: to erase your personal information in limited circumstances where (a)
                                you believe that it
                                is no longer necessary for us to hold your personal information; (b) we are processing
                                your personal
                                information on the basis of legitimate interests and you object to such processing, and
                                we cannot demonstrate
                                an overriding legitimate ground for the processing; (c) where you have provided your
                                personal information
                                to us with your consent and you wish to withdraw your consent and there is no other
                                ground under which we
                                can process your personal information; and (d) where you believe the personal
                                information we hold about
                                you is being unlawfully processed by us;
                            </li>
                            <li>
                                Right of restriction: to restrict processing of your personal information where: (a) the
                                accuracy of the
                                personal information is contested; (b) the processing is unlawful but you object to the
                                erasure of the personal
                                information; (c) we no longer require the personal information for the purposes for
                                which it was collected,
                                but it is required for the establishment, exercise or defense of a legal claim or (d)
                                you have objected to us
                                processing your personal information based on our legitimate interests and we are
                                considering your objection;
                            </li>
                            <li>
                                Right to object: to object to decisions which are based solely on automated processing
                                or profiling;
                            </li>
                            <li>
                                Right to ask for a copy: where you have provided your personal information to us with
                                your consent, to ask
                                us for a copy of this data in a structured, machine-readable format and to ask us to
                                share (port) this data to
                                another data controller; or to obtain a copy of or access to safeguards under which your
                                personal information
                                is transferred outside of the EEA
                            </li>
                            <li>
                                Right to withdraw your consent. You have the right to withdraw your consent on using
                                your personal data.
                                If you withdraw your consent, we may not be able to provide you with access to certain
                                specific
                                functionalities of our services
                            </li>
                            <li>
                                Request the transfer of your Personal Data. We will provide to you, or to a third-party
                                you have chosen,
                                your personal data in a structured, commonly used, machine-readable format. Please note
                                that this right only
                                applies to automated information which you initially provided consent for us to use or
                                where we used the
                                information to perform a contract with you
                            </li>
                        </ul>

                        <p>
                            Under certain circumstances, you may have the right to object, on grounds relating to your
                            particular situation,
                            to the processing of your personal data by us and we may be required to no longer process
                            your personal data.
                            Moreover, if your personal data is processed for direct marketing purposes, you have the
                            right to object at any
                            time to the processing of personal data concerning you for such marketing, which includes
                            profiling to the
                            extent that it is related to such direct marketing. In this case your personal data will no
                            longer be processed for
                            such purposes by us.

                        </p>

                        <p>
                            In addition to the above, you have the right to lodge a complaint with a supervisory
                            authority for data protection.
                            Please note that the right of access and the right to erasure do not constitute absolute
                            rights and the interests of other
                            individuals may restrict your right of access or erase in accordance with local laws.
                        </p>

                        <p>
                            We will ask you for additional data to confirm your identity and for security purposes,
                            before disclosing data requested
                            by you. We reserve the right to charge a fee where permitted by law. We will decline to
                            process requests that jeopardize
                            the privacy of others, are extremely impractical, or would cause us to take any action that
                            is not permissible under
                            applicable laws. Additionally, as permitted by applicable laws, we will retain where
                            necessary certain personal
                            information for a limited period of time for record-keeping, accounting and fraud prevention
                            purposes.

                        </p>

                        <p>
                            To make such requests, please contact us at <a
                                href="mailto:support@easyseo.ai">support@easyseo.ai</a>.
                        </p>
                    </li>
                    <li style="font-size:18px;" id="point-10">
                        California Resident Rights
                        <p>
                            This section of the Policy applies to you, if you are a California resident, as per
                            California Privacy Rights Act, 2020
                            (simply called “CPRA”), California Consumer Policy Act, 2018 (simply called “CCPA”) and
                            California Online
                            Privacy Protection Act (simply called “COPPA”). This privacy notice section for California
                            residents supplements
                            the information contained in our Privacy Policy and it applies solely to all visitors,
                            users, and others who reside in the
                            State of California.
                        </p>
                        <p>
                            Categories of Personal Information Collected
                        </p>
                        <p>
                            We collect information that identifies, relates to, describes, references, is capable of
                            being associated with, or could
                            reasonably be linked, directly or indirectly, with a particular consumer or device. The
                            following is a list of categories
                            of personal information which we may collect or may have been collected from California
                            residents within the last
                            twelve (12) months
                        </p>
                        <p>
                            Please note that the categories and examples provided in the list below are those defined in
                            the CCPA. This does not
                            mean that all examples of that category of personal information were in fact collected by
                            us, but reflects our good faith
                            belief to the best of our knowledge that some of that information from the applicable
                            category may be and may have
                            been collected. For example, certain categories of personal information would only be
                            collected if you provided such
                            personal information directly to us
                        </p>

                        <ul>
                            <li>
                                Category A: Identifiers.
                                <p>
                                    Examples: A real name, alias, postal address, unique personal identifier, online
                                    identifier, Internet Protocol
                                    address, email address, account name, driver's license number, passport number, or
                                    other similar identifiers.

                                </p>
                                <p>Collected: Yes.</p>
                            </li>
                            <li>
                                Category B: Personal information categories listed in the California Customer Records
                                statute (Cal.
                                Civ. Code § 1798.80(e)).

                                <p>
                                    Examples: A name, signature, Social Security number, physical characteristics or
                                    description, address,
                                    telephone number, passport number, driver's license or state identification card
                                    number, insurance policy
                                    number, education, employment, employment history, bank account number, credit card
                                    number, debit card
                                    number, or any other financial information, medical information, or health insurance
                                    information. Some
                                    personal information included in this category may overlap with other categories
                                </p>

                                <p>Collected: Yes</p>
                            </li>
                            <li>
                                Category C: Protected classification characteristics under California or federal law.

                                <p>
                                    Examples: Age (40 years or older), race, color, ancestry, national origin,
                                    citizenship, religion or creed,
                                    marital status, medical condition, physical or mental disability, sex (including
                                    gender, gender identity, gender
                                    expression, pregnancy or childbirth and related medical conditions), sexual
                                    orientation, veteran or military
                                    status, genetic information (including familial genetic information).

                                </p>
                                <p>
                                    Collected: No
                                </p>
                            </li>
                            <li>
                                Category D: Commercial information.
                                <p>
                                    Examples: Records and history of products or services purchased or considered.
                                </p>
                                <p>
                                    Collected: Yes.
                                </p>
                            </li>
                            <li>
                                Category E: Biometric information.
                                <p>
                                    Examples: Genetic, physiological, behavioral, and biological characteristics, or
                                    activity patterns used to
                                    extract a template or other identifier or identifying information, such as,
                                    fingerprints, faceprints, and
                                    voiceprints, iris or retina scans, keystroke, gait, or other physical patterns, and
                                    sleep, health, or exercise data.
                                </p>
                                <p>
                                    Collected: No.
                                </p>
                            </li>
                            <li>
                                Category F: Internet or other similar network activity.
                                <p>
                                    Examples: Interaction with our Service or advertisement.
                                </p>
                                <p>
                                    Collected: Yes.
                                </p>
                            </li>
                            <li>
                                Category G: Geolocation data.
                                <p>
                                    Examples: Approximate physical location.
                                </p>
                                <p>
                                    Collected: Yes.
                                </p>
                            </li>
                            <li>
                                Category H: Sensory data.
                                <p>
                                    Examples: Audio, electronic, visual, thermal, olfactory, or similar information.
                                </p>
                                <p>
                                    Collected: No.
                                </p>
                            </li>
                            <li>
                                Category I: Professional or employment-related information.
                                <p>
                                    Examples: Current or past job history or performance evaluations.
                                </p>
                                <p>
                                    Collected: No.
                                </p>
                            </li>
                            <li>
                                Category J: Non-public education information (per the Family Educational Rights and
                                Privacy Act
                                (20 U.S.C. Section 1232g, 34 C.F.R. Part 99)).
                                <p>
                                    Examples: Education records directly related to a student maintained by an
                                    educational institution or party
                                    acting on its behalf, such as grades, transcripts, class lists, student schedules,
                                    student identification codes,
                                    student financial information, or student disciplinary records
                                </p>
                                <p>
                                    Collected: No.
                                </p>
                            </li>
                            <li>
                                Category K: Inferences drawn from other personal information.
                                <p>
                                    Examples: Profile reflecting a person's preferences, characteristics, psychological
                                    trends, predispositions,
                                    behavior, attitudes, intelligence, abilities, and aptitudes.
                                </p>
                                <p>
                                    Collected: No.
                                </p>
                            </li>
                        </ul>
                        <p>
                            We use the personal information that we collect or receive for the business purposes as
                            described above. We may
                            disclose the above listed categories of personal information to third parties for business
                            purposes as described above.
                            As previously mentioned in this Policy, we do not “sell” (as such term is defined in the
                            CCPA) personal information.
                        </p>
                        <p>You are entitled to the following specific rights under the CCPA and CPRA in relation to
                            personal information
                            related to you:</p>
                        <ul>
                            <li>
                                You have a right to request that we will disclose certain information to you about our
                                collection and use of
                                personal information related to you over the past 12 months, including: (i) The
                                categories of personal
                                information that we collect about you; (ii)The categories of sources from which the
                                personal information is
                                collected; (iii) The purposes for collecting, using, or selling that personal
                                information. (iv) The categories of
                                personal information that we disclosed for a business purpose or sold, and the
                                categories of third parties to
                                whom we disclosed or sold that particular category of personal information. (v) The
                                specific pieces of
                                personal information that we have collected about you.
                            </li>
                            <li>
                                You have a right to request that we delete personal information related to you that we
                                collected from you
                                under certain circumstances and exceptions.
                            </li>
                            <li>
                                You also have a right not to be discriminated against for exercising your rights under
                                the CCPA and CPRA.
                            </li>
                            <li>
                                You also have a right to submit your request via an authorised agent. If you use an
                                authorised agent to submit
                                a request to access or delete your personal information on your behalf, the authorised
                                agent must: (1) be a
                                person or business entity registered with the California Secretary of State to conduct
                                business in California;
                                (2) provide proof of such registration; and (3) provide documentation or other proof
                                indicating that they are
                                authorized to act on your behalf. We may also require you to verify your identity
                                directly with us, and directly
                                confirm with us that you provided the authorized agent permission to submit the request.
                            </li>
                            <li>
                                You have a right to opt-out of sale or sharing of Personal Information (“PI”) and limit
                                the use or disclosure
                                of your Sensitive Personal Information (“SPI”)
                            </li>
                            <li>
                                You have a right to correction, where you can request to have your PI and SPI corrected
                                if you find them to
                                be inaccurate.
                            </li>
                            <li>
                                You have a right to opt-out of automated decision making, where you can say no to your
                                PI and SPI being
                                used to make automated inferences, e.g. in profiling for targeted, behavioral
                                advertisement online.

                            </li>
                            <li>
                                You have a right to know about automated decision making, where you can request access
                                to and knowledge
                                about how automated decision technologies work and what their probable outcomes are.

                            </li>
                            <li>
                                You have a right to limit use of sensitive personal information, where you can make
                                businesses restrict their
                                use of your SPI, particularly around third-party sharing.
                            </li>
                        </ul>
                        <p><u> To make such requests, please contact us at <a
                            href="mailto:support@easyseo.ai">support@easyseo.ai</a></u></p>
                        <p>The above rights will only become exercisable by California residents if our Company falls
                            within the scope of CCPA
                            and/or CRPA. Further, we will verify your request using the information associated with your
                            account, including email
                            address. Government identification may also be required. </p>
                        <p style="text-decoration: underline;">
                            A request for access can be made by you only twice within a 12-months period. Any
                            disclosures that we provide will
                            only cover the 12-months period preceding receipt of your request. We do not charge a fee to
                            process or respond to
                            your verifiable User request unless it is excessive, repetitive, or manifestly unfounded. If
                            we determine that the request
                            warrants a fee, we will inform you of the reasons for such a decision and provide you with a
                            cost estimate before
                            processing further your request.
                        </p>
                    </li>
                    <li style="font-size:18px;" id="point-11">
                        <p>
                            Under Nevada law, certain Nevada residents may opt out of the sale of “personally
                            identifiable information” for
                            monetary consideration to a person for that person to license or sell such information to
                            additional persons.
                        </p>

                        <p>
                            “Personally identifiable information” includes first and last name, address, email address,
                            phone number, social
                            security number, or an identifier that allows a specific person to be contacted either
                            physically or online.
                        </p>

                        <p>
                            Please note, we do not sell your personal information to anyone.
                        </p>
                    </li>
                    <li style="font-size:18px;" id="point-12">
                        Rights of Data Subjects from Israel and other Jurisdictions
                        <p>
                            If you are from Israel, your data protection rights are provided under Privacy Protection
                            Law, 5741-1981 issued by
                            the Israeli Data Protection Authority (ILITA). This section applies to Israeli residents,
                            and to other users who may
                            have a separate data protection law as per the laws of their jurisdiction. Based on the
                            applicable law, you may be eligible
                            for some or more of the following rights in respect of your personal information:
                        </p>

                        <ol type="I">
                            <li>
                                Right to obtain information: You may have a right to obtain information about how and on
                                what basis your
                                personal information is processed and to obtain a copy.

                            </li>
                            <li>
                                Right to rectification: You may have the right to have any incomplete or inaccurate
                                information we hold
                                about you rectified and corrected
                            </li>
                            <li>
                                Right of Erasure: You may have the right to erase your personal information in limited
                                circumstances where
                                (a) you believe that it is no longer necessary for us to hold your personal information;
                                (b) we are processing
                                your personal information on the basis of legitimate interests and you object to such
                                processing, and we
                                cannot demonstrate an overriding legitimate ground for the processing; (c) where you
                                have provided your
                                personal information to us with your consent and you wish to withdraw your consent and
                                there is no other
                                ground under which we can process your personal information; and (d) where you believe
                                the personal
                                information we hold about you is being unlawfully processed by us.
                            </li>
                            <li>
                                Right of restriction: You may have the right to restrict processing of your personal
                                information where: (a)
                                the accuracy of the personal information is contested; (b) the processing is unlawful
                                but you object to the
                                erasure of the personal information; (c) we no longer require the personal information
                                for the purposes for
                                which it was collected, but it is required for the establishment, exercise or defense of
                                a legal claim or (d) you
                                have objected to us processing your personal information based on our legitimate
                                interests and we are
                                considering your objection.
                            </li>
                            <li>
                                Right to object: You may have the right to object to decisions which are based solely on
                                automated
                                processing or profiling.

                            </li>
                            <li>
                                Right to ask for a copy: Where you have provided your personal information to us with
                                your consent, you
                                may have the right to ask us for a copy of this data in a structured, machine-readable
                                format and to ask us to
                                share (port) this data to another data controller; or to obtain a copy of or access to
                                safeguards under which
                                your personal information is transferred outside of your jurisdiction.
                            </li>
                            <li>
                                Right to withdraw your consent. You may have the right to withdraw your consent on using
                                your personal
                                data. If you withdraw your consent, we may not be able to provide you with access to
                                certain specific
                                functionalities of our services.
                            </li>
                            <li>
                                Request the transfer of your Personal Data. If you so have this right, we will provide
                                to you, or to a thirdparty you have chosen, your personal data in a structured,
                                commonly used, machine-readable format. Please
                                note that this right may only apply to automated information which you initially
                                provided consent for us to
                                use or where we used the information to perform a contract with you.
                            </li>

                        </ol>

                        <p>Data Protection Officer (DPO): Deeve (<a
                                href="mailto:support@easyseo.ai">support@easyseo.ai</a>)</p>

                        <p>To make such requests, please contact us at <a
                                href="mailto:support@easyseo.ai">support@easyseo.ai</a>. Please note, we reserve the
                            right to reject the
                            request if you are not entitled to the right that you request to enforce.
                        </p>
                    </li>
                    <li style="font-size:18px;" id="point-13">
                        How do we respond to legal requests?
                        <p>
                            We may access, preserve, and share your information in response to a legal request (like a
                            search warrant, court order
                            or subpoena/summon) if we have a good faith belief that the law requires us to do so. This
                            may include responding to
                            legal requests from law enforcement agencies, courts, tribunals, and government authorities.
                            We may also access,
                            preserve and share information when we have a good faith belief it is necessary to: detect,
                            prevent and address fraud
                            and other illegal activity; to protect ourselves, you and others, including as part of
                            investigations; or to prevent death
                            or imminent bodily harm. We also may retain information from accounts disabled for
                            violations of our terms for at
                            least a year to prevent repeat abuse or other violations of our terms.

                        </p>
                    </li>
                    <li style="font-size:18px;" id="point-14">
                        Children Privacy
                        <p>
                            Protecting children's privacy is important to us, and therefore our Site or our services are
                            not intended for children. We
                            do not direct the Site or our services to, nor do we knowingly collect any personal
                            information from, such children. If
                            you are not of majority (or above) as per the law of jurisdiction that applies to you, you
                            are not authorized to use the
                            Site without your parent/guardian’s consent. Children under the age of 13 are not allowed to
                            create an account or
                            otherwise use our website. Additionally, if you are in the EEA, you must be over the age
                            required by the laws of your
                            country to create an account or otherwise make a purchase on the website, or we need to have
                            obtained verifiable
                            consent from your parent or legal guardian. If we learn that a child has provided personally
                            identifiable information to
                            us, we will use reasonable efforts to remove such information from our database. Please
                            contact us at
                            <a
                                href="mailto:support@easyseo.ai">support@easyseo.ai</a> if you believe we knowingly or unknowingly collected information
                            described in this Section.
                        </p>
                    </li>
                    <li style="font-size:18px;" id="point-15">
                        How can I withdraw my consent? (OPT-OUT)
                        <p>
                            If you sign up, you will automatically start receiving promotional emails and direct mail
                            from us. If after you opt-in,
                            you change your mind, you may withdraw your consent for us to contact you, for the continued
                            collection, use or
                            disclosure of your information, at any time, by contacting us at <a
                            href="mailto:support@easyseo.ai">support@easyseo.ai</a>
                        </p>
                    </li>
                    <li style="font-size:18px;" id="point-16">
                        Governing law and Dispute Resolution
                        <p>
                            Unless provided by the relevant statute, rules, or directives applicable to the jurisdiction
                            in which you reside, in case of
                            any disputes, issues, claims or controversies arising out of or in relation to your use of
                            the Site or our services, the
                            governing law and dispute resolution mechanism as provided in the Terms of Service shall
                            apply to this Privacy Policy
                            as well
                        </p>
                    </li>
                    <li style="font-size:18px;" id="point-17">
                        Do you have questions or concerns about this Privacy Policy?
                        <p>In the event you have any grievance regarding anything related to this Privacy Policy, Terms
                            of Service, or with any
                            content or service of Easyseo.ai, in that case you may freely write your concerns through
                            your registered email to
                            Grievance Officer/Designated Representative to below:</p>
                        <ul>
                            <li>
                                Name: Deeve
                            </li>
                            <li>
                                Email: <a
                                href="mailto:support@easyseo.ai">support@easyseo.ai</a>
                            </li>
                        </ul>
                    </li>
                    <li style="font-size:18px;" id="point-18">
                        Updates to this Policy
                        <p>
                            We may add to or change or update this Privacy Policy at any time, from time to time,
                            entirely at our own discretion,
                            with or without any prior written notice. You are responsible for checking this Policy
                            periodically. Your use of the
                            Site/services after any amendments to this Policy shall constitute your acceptance to such
                            amendments.
                        </p>
                    </li>

                    <li style="font-size:18px;" id="point-19">
                        Welcoming of Suggestions
                        <p>
                            We welcome your comments regarding this Privacy Policy. Please write to us at
                            <a
                                href="mailto:support@easyseo.ai">support@easyseo.ai</a>.
                        </p>
                    </li>
                </ol>

                <p>
                    Last updated on <strong> April 23, 2023</strong>
                </p>
            </div>
        </div>

    </div>
</section>
<!-- Faqs Content Ends Here -->
@endsection