<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\AsPartner;
use Illuminate\Support\Str;
use AS2\PartnerInterface;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AsPartner>
 */
class AsPartnerFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = AsPartner::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'id' => 'Partner_Nextred_Local',
            'email' => 'n.roshyara@bernstein-badshop.de',
            // 'target_url' => 'http://local.edifact-interface/as2/orders',
            'target_url' =>"http://127.0.0.1:8000/as2/orders",
            // 'certificate' => 'ssh-ed25519 AAAAC3NzaC1lZDI1NTE5AAAAIKddUFekV2dY3gUQrtxv7VT8uoIN+gmrVz+QSS/lGb/8 jan@ONEDOTs-MBP-3.ONEDOT',
            'certificate' => 'ssh-rsa AAAAB3NzaC1yc2EAAAADAQABAAABgQCo3/Tbb7NtnqIldS0CdeUEg1rtfPr9F+NpD2wki6ikmx0h3U/2maeTWFwyLh6d7KCeNmYRmR1nF67OlRUYtcZY6g9UAc3e6KPBCwfuzVDVmgthYwY/tVgZHcL+t5c6vskrSQx/5PXSWeS7l1gzh3JeLpUeyfy2eTkxR0mFYcELp0AXQMJ/vyY8dJ/PXR1mlY0We18KTlM1F+dPtFHBYnfY/W0GCauHmw0aAZ5uooEgxJyJlwAoXVY4pjKozAWuZ2fE8hz8QkFnI/6JmnvMC6HYWlKKDMAJxhQ5kdCrjPb6jXTUjwWPR6uXnWoIf9Y3VWhksKujBCTPBH5NRTqHKcXuRPsm6EZN/1sK8sGBpMEwNHM07cRZA+3F5+Hps+chbID+grTedlT5vGRODwWj/zbmauQjLDR8nKfoRHsvpN/vbIv7ALbRvQ9qw9D67llwlG+ABZ1vjcEripr3ROJusIO8vW8pC0EvgAbnPWBiOIEjTXeuQDQE64TePFMleO1hcWU= n.roshyara@Nextrend-PC140',
            'private_key' => '-----BEGIN OPENSSH PRIVATE KEY-----
            b3BlbnNzaC1rZXktdjEAAAAACmFlczI1Ni1jdHIAAAAGYmNyeXB0AAAAGAAAABDvyt/HXa
            k9YVVjePnt+1N/AAAAEAAAAAEAAAGXAAAAB3NzaC1yc2EAAAADAQABAAABgQCo3/Tbb7Nt
            nqIldS0CdeUEg1rtfPr9F+NpD2wki6ikmx0h3U/2maeTWFwyLh6d7KCeNmYRmR1nF67OlR
            UYtcZY6g9UAc3e6KPBCwfuzVDVmgthYwY/tVgZHcL+t5c6vskrSQx/5PXSWeS7l1gzh3Je
            LpUeyfy2eTkxR0mFYcELp0AXQMJ/vyY8dJ/PXR1mlY0We18KTlM1F+dPtFHBYnfY/W0GCa
            uHmw0aAZ5uooEgxJyJlwAoXVY4pjKozAWuZ2fE8hz8QkFnI/6JmnvMC6HYWlKKDMAJxhQ5
            kdCrjPb6jXTUjwWPR6uXnWoIf9Y3VWhksKujBCTPBH5NRTqHKcXuRPsm6EZN/1sK8sGBpM
            EwNHM07cRZA+3F5+Hps+chbID+grTedlT5vGRODwWj/zbmauQjLDR8nKfoRHsvpN/vbIv7
            ALbRvQ9qw9D67llwlG+ABZ1vjcEripr3ROJusIO8vW8pC0EvgAbnPWBiOIEjTXeuQDQE64
            TePFMleO1hcWUAAAWQbNYGbl5e34pfMqD9ic/MZfIg8FYmphMC1Sid96ASDoM2lFNmIe4g
            LGRnNyviu0deyZchH2e7T7Ar1DQgLA46jqxoDoHdYQ4B/ILREYBbwplhWOvJtIuWVlNHRZ
            j4JE/bgXyqlZ/22tTPFHAUt+Ag6lyrGIixDyvnTU9Mhc23zAGIZkBoPjlzsKtEYmpLG4gU
            vZtqrn2ct/B/2XrQHxAmPhTChlhYqwpOCahoDwHmZXNSQVk9XR9KMuuAidIHOvxXVZU2Ll
            KMCdv/7tuJyQ/+HNENybmyA76LQQS3dF4FVDyRB8E9G+b7oE4ZlHPtbiugKhI6DuDZ6Urk
            daKV0X3I3oB+hPkFkFpqYaGs+c7ccLqARiZyobI4lpO6yrhksGbCZODqs7e5l/J67EbgEN
            LyPsZluvdleCTJnkM9Lt1bauYxLbgyk367BUniW3M7DOKP/G1rJY9hIeyQdJCj28ivmN+0
            C0gE3+DM9v+v+u4EOBbecvyvfPGzJ9SpwGfM2H4kIqjL53XrG8G/tXRJDR+FrWwhK/jchH
            HlAK1Mc1x8T1+txOw9gDF17y21pswL68nqQNFC3R2pVoDHrZzjUqIIrVIPMqE0nbFc/1ZW
            EbZO0e8NZsnfB/bdhon2TIJoX5mRV4h7rBxDotOvRtNDRkzhAoOQiUs4YV/zy9+FMgfj1R
            1z0sOAPObYni/qC7FCJUt5kkju1vUisbXl+FkUyC11G+vd+gVwui2TKWx0VycJ6L2npwkW
            RBW5FzWZrqxS+h61/XziGAQxIAYwbLtplYXmUMI9VuSSFeliFoq1Z9ej2vCzqlyEpJvaZt
            W5YSQQpRyJl8FhgCpnkIF+/uOotN+5i77MKR1OXLUXIq32qjWQYjSB2YhRBIprsmsL9rnO
            TbkfqnIy3zbr0JlcacBAs3j3M27ddEyQKE+wuZf+SUIOM6QsQ1j0RGgTlch7gSER6mLSOu
            X45x1y9tJXtifzG+SVBqGUeq7E24sa5e5GpRy8Xz2TSz92N0+KLl9UyZAeuObgaEW29hVe
            MsWuiboGBQaOnea9Ek5/wCCbvAtoTs9KxeOTBF7xNWyYlTPVml4AT2YK9Wj4zBajhKjzk/
            RiJJME305f3l8xZvH41QKI6eMJ6/alQ4hgN5lVVecGzMeomTb85+CVlMY6kXd0zrFLhppG
            lyn11Tg8YkPRcV8liwDWlkm3HkMcU0kIadD0uINrLifxktHIA3FqLGjWe2eTFP/UX7rp8d
            ro9Nam0lIhmtawfp3g0Pftd6kBeSfqAkRbnAoKNqPZpBsnfIzEE2s17ZZKFNppbjEjxwiS
            SkdosP+p01lmYJV1Th+x42vMH4mAJZLtd3jjQSjlrXb0hBGiETVaGpcxlFMLY8gbs2jBnO
            AsrKozozovTy42KZa8u77iUW501bbJ19wlZDy62749vX99qmtMhPZZ5UQPRFPM+eljs3aP
            aJLhL/lluolsZIPvAh93QriBT4Vaaeo42+4JvnppsjRIQrrOvgWQPoNbWtwV3sYIm4vCq9
            bL69/5SZj6xGPf0ybXDeIMJdnjKI2r3k0FGb08WPCgvS95Uxe6L0vy6y7/eAX3GwDOqqxs
            HuK7eEI8xxaECotnWunusUJXHyhQuTWXr1siElCGCIB9o6Qe0mHf2CC0Rvkw4bPXm+QAox
            5/YwIXbrpx1PKJMd83m/86j4pgPtVyQ0LKpd7bOCn71DFCDBlRVQMQRUMzaN0t/3n0I54P
            uiNvn4BpfHR4jendHPn+RAy/9xEHzTwV0OwSDrSVll2j9stzfnXGcg4/snubvGbdmANOCH
            gVn/ys0SeOIGNtqoxeg3VB/ns7hTfzggtd8LYOXURrmLs+IemGUpxe0rzfE05f2DfqP7Hf
            7Howjc+V46Ooml/wISqfQ/UhN3k=
            -----END OPENSSH PRIVATE KEY-----',
            'private_key_pass_phrase' => '12345678',
            'auth_user' => '',
            'auth_password' => '',
            'content_type' => 'Text/Plain',
            'subject' => 'orders',
            'mdn_mode' => PartnerInterface::MDN_MODE_SYNC,
            'content_transfer_encoding' => 'base64',
             'mdn_subject' =>  'orders',
            'mdn_options' => 'signed-receipt-protocol=optional, pkcs7-signature; signed-receipt-micalg=optional, sha256'
        ];
    }
}
