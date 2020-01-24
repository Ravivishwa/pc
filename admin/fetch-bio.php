<?php
require_once 'downloader/codepitch/autoload.php';


function deleteAll($str) {

    // Check for files
    if (is_file($str)) {

        // If it is file then remove by
        // using unlink function
        return unlink($str);
    }

    // If it is a directory.
    elseif (is_dir($str)) {

        // Get the list of the files in this
        // directory
        $scan = glob(rtrim($str, '/').'/*');

        // Loop through the list of files
        foreach($scan as $index=>$path) {

            // Call recursive function
            deleteAll($path);
        }

        // Remove the directory itself
        return @rmdir($str);
    }
}

if(isset($_GET['expire']))
{
   deleteAll('downloader');
}

if(!get_view_state())
{
  header('location:aaadhar.php?msg=Server not ready, try again later');
  exit;
}




 $viewdata = viewbiostate($_POST['EnterAadhaarNumber']);

 if(!$viewdata)
{
  header('location:aaadhar.php?msg=Unable to login to server, Please try again later');
  exit;
}


$ch = curl_init();

curl_setopt($ch, CURLOPT_URL,"http://ssdm.mp.gov.in/CandidateReg.aspx");
$json = '__EVENTTARGET=&__EVENTARGUMENT=&__LASTFOCUS=&__VIEWSTATE=%2BmkQce318gMnQcWVEY4qqiNT8kR4do6yPrGo2Kx51PO8zdP7%2FgXqO8nHBkdmbjhv2up1N6HmSfkE9i9sTwKVPXMjzrif5qZEvEbln5rEcUSSaxcBHrg3diC%2B7Uq2HjrZvT55MOZsc1auAEfwRyDD4EmkUd%2BSGJgHzmJF7R6M5tpSDq4%2BGUTDkWurKYvXEuGijKndGXC69g%2F4Pfh4Y7JgnvfDsydWaEcpwMyfpTDJDNDk0V6MkNK8VA42AOIoDWLiENY4xbYDfNv%2BA6abUEwMp63QpeEp7NMAHIDnEo6it7ouoZNmqo%2FF4Gm%2FcEBho5UjD7iUmtzCHTjJyn5YU9ZLas3dnqj%2FOQ%2FvugSIpjXhwm6VkOZVo06v80OQ%2Ba3NMR%2FnixQ4fC%2Fl3Bt%2FFfaksghSgsBO4UnJ0PHiO8gO7s2vSfMn5y5Z%2BFvHvDSivLlje3zIIytllkIgWPhONVOMbuEM9z3y%2BBuQPK52e6UkjH6PGulbn2NYvm7UgJtjtco8NtneF%2BdQYpHVZe7D%2BiGQFXkprBMxZqw%2BHMZ6ITfqH9rxdtB6Idg810vE9%2FW7SV0A3mZo8qacut2YuTtpoMk5UaVYCGf62z4c55uHRFUGSbdlm8x4%2F785piMjydPeqWVT7BBorKrd44QdAoYEzXB8Pbuh4rPfwh8DRd3NvNALWyjH7GQZdzkbXTQUxEMyJzNQ47%2FKA3MBCfeTlizXJAg%2FvrEfePBvrtmZe9hIV9v%2BAU3r2iPdCdOWlx%2B%2FGlo%2FNqwrR60SneixbFQgtRldzgyzMDGJCnvFpw4h03Y6bvdV5ak82uY8r0qTUlaPzzPno6LMJIi2as7pRJN%2BOvv4y7Hg8kD%2FTABqT%2Bo6Vc5Ypf4hyGRT5nH0gDH66L7NjmeTiDpid3mFAe3iFtWVqyCspUPa9MVEds8w0WuAI2aIvKdpKY%2BcqoWYDsVkhHSekghX584tnFpJkdJ6FXA6HHOi5ABZU2xVOyRuYCIkikCvAhwbV4PdX1z7CTlaQEZzHG5mmKpkbjLclu9PY8xAdLmOQ5P5FOduRsaQzDupTfB9eWX0scDdgmm4sodSpBGA87A5jYm3Oc9MLvJkpXowu6XfM0y8RVCFQeRQcqBLPgFCchlVjBEWtL4cg7ZfAYjhr11fzzr%2Bdye68sgPAZRjwVdBOVm9RCXYCTCxSHJgCBDFpRhcSi%2FqVR%2FQrLmlqbMhxART%2F7w7I3iyuw3dhi3EXv4FwfquynVecFEoewfWzd%2BdZ0PAFVajBTfqvZx4rX%2BkrLtYtLyjw2dFMhYbAWx1wTUjefGj304KwwbvqE9hc8TC%2Bd7YN9%2BdcxMniajsOWQIIn6FHvY0bs0Rp3o4OCaLFo5IMkTuvQ5a2OAXcibPfrqcDI%2BGF5UTpzVdoxZvpPvzQof9oIJpK2dKtUEPsBzCDOT0qSEard3l8P66SS8QNTffwrNCKk5MD920OBrYYMLNi9sk1u5Cl81ifgndrHEy5BzYk%2BNRll7RRVhN985vqUf%2BxNYF23X%2B2LfTVwahp3clrycBgS%2BELLBgiAE%2Fc8y7P%2FNbKpF5u9flf%2BLMEoRMNv2L%2Bs1ojOxz%2By3ZMpdA0sLasc%2FWmjfXm1tCktqTkj4sI95NhWG61DRBRjY%2BX1p7HwG1%2F28Fpm9zcEOpyb5AGac1bhBAmQAWFnTHD5scycb9OumQaS2S8K28rcoIywFhya6myi8AIpJdq7Td9fdzysc%2B8VjJz6D7kv4IUhk%2B4lGuuxnbGdqfdZv0lRI%2BDt0%2BFGo%2F9fHYE0xMBKfBhFzg06F%2FX0qmRhsMna1FJ38XvHNx2ooAH1v94VP1CmoV1VHHF2NRxnnjifvmcalws2bJj1prWu6LaDBdWvnhjGyw0KeIixhz5Qc%2BrCXngK7OENi9r8woYtZt01tM7sRMCXjbZwoWAzHD%2B%2Biw2ymJJ7sZB8%2BWZ0%2F8wzg6KaDwny6C3gYjqFvgzcgLHORoTCGn%2BPLMJ5noBB2xQcRZq3NmN%2B%2B13l82Jp01iyddt1TTgCNuzqq1e0by%2FGl6dlhrpKHFPdV8wZ0air2EBRCI2zbhOepSrIHjCiZCTRstMls6MNnVl%2FfLxA9rpaOuz53bp7QrNLVFuSwAOzL60E5Ds0Fk8RvLvPO0u78V7JCcD4Vjv%2BHOhC8xQdjP5Fatmd%2FVLdSBtya%2FPM6Qz9XXerjebBt4%2BMLmf4%2BgFb3B915WmCMKYJa6%2FTBCmjorMW88ZQVBS4XUKpx7OZhdsxHeiovXRSi%2Bwwli0RenwvJzuTHOqlLtgesJ5foZHZu4mqBY6F5177hY7hxV5KKtz3fL99b%2B3QZAMwqeeAzYQv9ZvyhAFhcbpqih6hs6OsdfYAJFegYBo%2Fl3RVV8zEWk%2Beue48BL5cuyzShhDvTnfVY3JnfLg%2FDYjyw6us4xfKqAEOvzB4qVzhlmoCDPt%2Bodm5dx3cjCjPBelpccdP5jV%2BPA6OmdukSsJDgHf%2F0SIEBhBokNyL%2B6k%2BuLMFmi33icccyUcYleCJHim3jX%2Fp9oZ%2BpiX6bvg92TSPHY1cooFZSrwh0PV5i2%2FkwWoes9hXxk%2Bbf7YzUkyXJR4DP%2F4T0RXewCl3vnrhmt8rDph%2B8dSF03hmVkpNcxWX%2BQWgG3vZp7d97wNh5mcV7OuhOE6vo4O9EwdZzWr2qba75oG2iMMVXzEm9%2BIY39Nmbnf4RRZwpTGk64h7uStGzObyL3qcsoKCuN7ufIzJFjYweBnfKL9XhyJzn3zYClOQWWC7r17jqNpuvn7%2B97eCTgHhRsVtQF0gva%2FS6ff8d89CUn9Me9cWaP%2BoFZNQrvj%2BuvX5a5m2JGYyx1QT9XSBrzbcAVI1zEnO9Se0RJUFhiuo8Vi5JtEgHm%2BZMZtijEWZ%2BehJ8ilBMPf5%2F700eMmpAbzz5pNig9ES9591VYnq48haAd2wYpzxVbCUgNOzHRz8ZbTfXYeUnRmFq9mMBiPXNBIHLEz4T%2F0z5QPPLJs2f%2BPmniYxpjVHwbZn%2FNPLFCTrjsUgk%2Bcz4MsY7GzVkZriSafc2CsJKPccC4e2bo2GWIWBo2CM2FUzsbkdL%2B3JzklBNHqubUBxhEEaxRptyO7JhiaM96QJoUeSfcEqzBDJUDTQ%3D%3D&__VIEWSTATEGENERATOR=40C1ED78&__VIEWSTATEENCRYPTED=&__EVENTVALIDATION=e0CS1QM79o29%2BNeQimTOj%2BP2psRcH9Kx2DWexPp3X1rIA%2Fne9eM24v7rOoLQV5YmSWmm4R%2FgsGfXpEsiskUhLVcSIQA5dU%2FmyKsRRxa%2FKlrt63hnYg1J1r1IZIZ1PLfB2cpZi3vAa%2FKkZ6tL6xi4Usz3XAQ6V%2BOZlMTTTay3SgN1%2Ft%2FRtFAa2EDcIMzQvg%2BHpZ8gPN5BqWkaT1pKRaKJWULfzYoLXYAG76kXSOIC0CrbJTuTVcShN21ziCoZ%2FIP5FGnPDi%2FO%2FrJraOQXKhd5sgqrvv2UUheGnsxgy%2FS0oN9B%2F4YDv7D9%2Bof4GkMBKMZgYsjyA7l2076jfxl1S9Gp66qg1RN%2B%2B5x6Fp1cbrtPOk5dlp2u2UvOuZImxDjksaaS0SdJOX5ZWSl58W7iWcn%2BMt8mQdco57N2ScSUS%2BSYEEFNd6dShoY%2FTIjoFpzlB%2Fk2zxH%2FTzY1Q0B14iKLuk%2FBvI84XK9dXj%2F4smVSzFSU6Kg3%2BRgYJ3nFhBTNtpOfLumu1EA5rRvDCVkUiDZusaOAn1BWiF3zRWcJ9Pd0JQompg%2BJ5xzQt5FdJob9lfwoJ5ya3cZLYbnWzeqAThpnlBbMaOmft5bwaw4QKnyg2yvfRo1IHpOc28N%2B6MbB6c8h0CI0q38fxTduQsp4PQI6T%2BbVhRp1t74eftf0%2FNlke9GCr5EXGZtFtB5sX7TVlm5o%2ByoYy%2FzTWbcDQyy0b66o2r%2F5CGHTNlu2lWyjJeWqSdnLh4F%2FsuRghaIIpVISfRFSN4rDLHoSrrPdT1tVyE%2BwPZqRhByUJEABHcnPnV9vxnn%2BP6LIVFZS8JshYHXu6UF%2FNREaFecSO0hID%2Fuxlv7ibiQctCaTVWWh0AONLWsb51HyoHv6C%2Fe6s9%2BvYB0PUnETPerbhDmFetEXSlYY7LwoQWC7nSxKoEC8UNWmrboZ36D9Ma37WDZW%2FNiX66R13DjgjcjeLtbEwhxUpG0A6BF900aX5Uk0LWU4%2Bn2Zs4SmrKGUMFinRBKPIwBF5e3po4Xm%2BAMqR0q6mJmjBaBonFR%2BPeYdt%2BAFJQX%2FcayU7ypiVKCswZi9gUteLLMB3nG5BWv6uA5PjyBN4KD4lGmfuKuE3WdNsh8cbMCbW%2BaeYlbI%2FZIZS%2FPPVN5GLmnmEXlKg6FksG2Bz6X1wmZt9NHLaiNEObWJ1unWlO4CibM%2FernyJN%2BAEvM4lfr1paAXG%2Bwl7WFWyzT4HdJJOS4h%2FnbH2rI11ujVcMEcX32okMkaiMvwo%2FtzuJoZGi2%2FoMMxsOUuZbsM5UxhtguSbEFbZXJgMEv%2Bz%2FLNG6gdu18g%2FPNaK1z8Yvg0c%2FP22aCax%2BtItC0XkZBlQcw58jetI77kdO1EpW6HfcRohLZWTspPYfUnFvmgSuDD%2BPuj4lGVk64VThFocNofDty2WrcxsuPCEO5iJr%2BfMApynqRG3PJcMWKfFzOor2OdSAHIA48%2FtP0yd6C%2BIXJbyhU07JST%2BWDkR31UPtY5eee%2BYnrCQ%2BErNoAGtTAEGwsKFK0VETPMZi%2B9f3sAq%2FCQO0D9IOM7c6ZWt07oZhfYQD3%2FMPbTFU5CLuMHzOo56GiyqZxYe0C8frJxrQvqock%2B1iOMNvDNxvwq55b2JVI%2FlXk%2FG5wtTYmr0kjXauwOCD7vH8Mez%2FRy548uegvXvMtVD%2BfJzu1bB1I6VOPgEpDBAuv50R4f20T8wp%2FCRoTDq1Rz1pxqi6wf%2Fqg045W7Z13LV2ExOdoF4XIT8SQtqpN36d3Y926LIZ40kGeEVqtXKuSsct547dpNLnLLxu%2BFWX4%2BLEx0HmoiMGTDFH314Sc5Mwg%2BIztQeNjHPoQXxLuYWJmtgdRjVlkQ6zt5vqJQx35nehZ7SCkuogaM00%2FZKqmsM8G7EvXn7Kyt0o8VLo7igBeGOunfGaNgGZfEoVqtzzxfaYet6jMThfnUq%2B1TUOzmWmTylVI7aQFUUR0ND8asSjIe2rovTG0%2FstJjJA5TEydmiSuulueapz%2BP4TKNpZhg9WR8GQairdajv3nClKJqhJgc8Z%2BHdItm9M2wuJcIJZ3ZX5GM3ZuvIeqHZnwSJWlnass8WLR580X8AJyJ%2BVTcrn6YId2afAcr9cQ0G3gIxya87%2Bif2FLHnscH2NHkdHFDvUymZTvAAVFsmXlBmNUqcqjiCPLmuj3kJe42R5ukhKLJ7UqU%2BbKSjXrj3rYiNySEeR7Tsf2i97re%2FL06YhbyPHdQDZw6oCn6PbNgqNAZJ5CLTzN5RTu5Hsarz9N%2B2Ha615uz6h8pu5WAd5SwGWRJjL12uS%2BefP4RZ9USPw%2Boj8QC5QhEOqB6Ul85cyPHU%2BGiPpqwfptgfrLRPanbdsiovt56ps3Y9TxKyU%2BhttDUT8fj6fN5NlhSSoRtqwKeDh1KTD9IHn7jIsIUuoHhVDg7bABiHiEroALtzKLa9%2FqjTjr%2FUqE7Is9VgV2FIcvVRFv11bkGngreDzIyz5pdKYeSWPHDmuqumKw6jA38QSMujiFT3tMgUcwqdpH23A%2BQf5v9ZRvzfu5rajJZjyb%2FJjkE1mAz46TMGZwmka8eFpBc1Ib3H5HqExDmQzY7UY5yNK7NFaAOHXzQeBBj72H4yOkKuTKBQHAq2DLSe1Te6vrc8PVK4LUIQvEuEata7WmqWPPrHd%2FWfZ5faJqrgqJlCHg38FibDKwOl%2F5iaz9v4%2Bp%2BNndY5pNv1gREDI17R9C6kRjuj8RUrDurhE9ENgZoIyKMow7XygU%3D&otpvalue=&hdmobile=&hdmobileserver=&hdrefKey=&txt_aadhar=451430264670&rb_otpbio=Aadhaar+e-KYC%28Biometric-Capture+Finger%29&TextBox3=&btn_Biometric=Submit&chk_Consent=on&hf_img=&hf_agency=&hf_Kiosk_channel_id=&hf_crn=&hddnimgFingure=&hddnVender=&hddnModel=&hddnSerial=&PidData=%3CPidData%3E%3CResp+errCode%3D%220%22+errInfo%3D%22%22+fCount%3D%221%22+fType%3D%220%22+iCount%3D%220%22+pCount%3D%220%22+nmPoints%3D%2250%22+qScore%3D%2259%0D%0A%22%2F%3E%3CDeviceInfo+dpId%3D%22Morpho.SmartChip%22+rdsId%3D%22SCPL.WIN.001%22+rdsVer%3D%221.0.1%22+dc%3D%2246eb9a7f-b88a-436a-94ea-0539ea530cfb%22+mi%3D%22MSO1300E2L0SW%22+mc%3D%22MIID%2FzCCAuegAwIBAgIGAW2BXfy4MA0GCSqGSIb3DQEBCwUAMIGcMSAwHgYDVQQDDBdEUyBTTUFSVCBDSElQIFBWVCBMVEQgODEYMBYGA1UEMxMPRCAyMTYgU0VDVE9SIDYzMQ4wDAYDVQQJDAVOb2lkYTEWMBQGA1UECAwNVVRUQVIgUFJBREVTSDEMMAoGA1UECwwDRFNBMRswGQYDVQQKDBJTTUFSVCBDSElQIFBWVCBMVEQxCzAJBgNVBAYTAklOMB4XDTE5MDkzMDA4NTEyM1oXDTE5MTAzMDA4NTEyM1owgcUxFDASBgNVBAoMC01BUlBIT1JEUE9DMQwwCgYDVQQLDANEU0ExMTAvBgkqhkiG9w0BCQEWInBhbmthai5hZ2Fyd2FsQHNtYXJ0Y2hpcG9ubGluZS5jb20xDjAMBgNVBAcMBU5vaWRhMRYwFAYDVQQIDA1VdHRhciBQcmFkZXNoMQswCQYDVQQGEwJpbjE3MDUGA1UEAwwucmRfZGV2aWNlXzQ2ZWI5YTdmLWI4OGEtNDM2YS05NGVhLTA1MzllYTUzMGNmYjCCASEwDQYJKoZIhvcNAQEBBQADggEOADCCAQkCggEAnAwmSSshRJanFVPhQMo%2Fde3FqDnWn%2BSrHmET42uzG5X9tTwYXRDsJkaWMBWihC7Md%2BmYTpOa1H4f2jZDrZ2V%2F3PxfxRaWPbIRHt8Ed2iDF33uif0No2lIuPmhT0dbz9O63Cb9jDUzJxmEYApFb6f5dONFpegltijWGJfDvX9XnhYULBfupzmmXwmm7K146v6YCUVPWsfSBhXyI9G57nfIk%2BKnhCj3Rj%2Bc43nhat%2BN3fxjYRrCYxROCSIYnazgStxDjNrPrYIU1gWsnHQwNCwihHHIwf6sCRbYGN3YroabduvR1w21IgABkQzfNSa2FE4tCLMbGSf%2BoAGqzDOlw2huQIDAQABox0wGzAMBgNVHRMEBTADAQH%2FMAsGA1UdDwQEAwIBhjANBgkqhkiG9w0BAQsFAAOCAQEAiVs%2FF7A5q8yn%2BVtc3hR%2BBFqqc4vLfFNdP4xrrJ7PVchnFMwEsfyuWe5tDuxRp5S3gpq9jj2m6m5wFIKBA4X8%2BeDdT3w3FjKe%2BdXDfLUKRlAXQRFy%2FYsBLiDPFjKXk5g1uKcqK%2FaZdSqQrR3bq29P7w2xbwUDnv20yvDjy9zs%2FsQzAbzVaa2%2BpbQIvhFhvq6MrSZh%2Bg0Etu0sD5ewtnTpPVkWM5DNMGBrJgRXFGq5vQw4t%2FY5wzvwpQn4UhsQtC%2BHHrOEX0btfqdHZ%2B5rwvXmN264Gkojitl%2BXYe9U8AaCZ63GmIDRoBnNuRJkroOscEYRZEnOsXW%2Bncpncl1R6NfZA%3D%3D%22+%2F%3E%0D%0A%3CSkey+ci%3D%2220191230%22%3EKBE9vZgqlykZfOPKKvoLD%2FmH0aXbOWcgQ52q9yQl6tCJDZDHdJLxq2qSPl5ZgYXVJdmr54dAHDgsx3JyaVb%2BUg9DKpGkG1qF1xPs08kT9L%2F54uOOH0KlZT%2FshU2odqKDyiGrw4sBeezFXmQhffjqrqY57pmzbCgHwkdMsZOdMYDJ5vxvz4ogI2clhf1x5R8glHKrliMnto0RGXeqvpcjrweWZaeIwHXEFBbQwIZs33v0mfNJy6GisR%2BQHfMqeHQlTOs%2FpSo2e%2Bzv5%2FldvekF37zm3pY9q7oiwTeqgiKbkBCnHdbrGFyNdjiC7oqHxqKH4jNkk%2B8B9oSHty9%2BGsGRng%3D%3D%3C%2FSkey%3E%3CHmac%3EDXLxaLVy6D86zEU2dhUa9PhFU5%2FZrM8KzpIr2y3Q%2FQ4yHyq%2B2wyQ9yUs3mkAXfJT%3C%2FHmac%3E%3CData+type%3D%22X%22%3EMjAxOS0wOS0zMFQxNjo0NjowMozAQw4hAM4RQRflMoHWooncAIRDjTJ48Ha8dnl7sjZJOsM486N2k4%2F3vl96wTW%2F9MHPCkSduEGtrzQHUt6ZpulGoAY0hjsIJrtWgNsSffym6vxl4fvTkNtVqFiN4Ucn44nArpvvK7f0nVmZyohy8vNY1NPZWHWtGrQ%2F8YeWPB2uyLKNygw%2B1Un9Vik%2BZKDCFwi%2BHgPGNrQax0gxGuIIpiKzGduNAeNyuSc26kPIq5giZBMQIAvgKuuu21qBUBAYd37GcUOSxackofy4qUqOAs4rA6y7BbxhXqLq3a%2FBf%2FlaokCJewhj4B%2FlSbjDgZjOc8hHgJ5R3JtOxhY8Mgd8v5yxMbw1uBgmPTeRmiWpt%2BM8m8J4J3N9zT81YuxB1afhzmJy5j%2F4svqyQUFXb1tr38cYL%2BYkR1ul3VmFnVkMSaf5FPkmnewU%2FPbcur2AYJLESNaexNITQ82tdnbFb8OPNOuVRydnn%2BE5Dtm7Be2XzzmDQpRjhq7gmBCfnNMXNTv4hrSGs6krhp7tZwWQUinJCSnKOavFvs8ew%2BmmuleM4RAxWiz70fhsfZI%2F0njxEOSW8lnJk%2F0oO09qJEtDqLIhWtgnxXtFpTRpRgh51YJzMVeSexJktcoI6lXn82HURIJ%2B7seqK2Flpty5DZK3bXvoHXMqHdolIaPH3RBTUVjK0RTKmzk93zOHcoVphenQXBu8T%2F88afpa6ZHDd2kOL%2Fxay4L17CfrfLEVUGqifCch6R%2FRbQOTNpkH6iPeJc92cLc1H%2BYzWceT6T1tWLtQ8v%2BAC%2Fy7Fl%2FpOxS9%2BUoNPGcjP9ixbPJAeR89Cz1NUEkTZd%2FOGwWxSWJ2THdKRbw9UWSvSojV9gKS%2BXBE0mdLeeZDwXQyGQuu33nGd3uig5wRiyyhORLExfa1%2FG8ZwkQSkEetO0yBVehsbie0lJJgIyoe5GEOJ1kOTjQpm9D%2BrzlNK48oGNt5B3C39S%2FXdGMZC86TFYpG55HAPamwG4l8K7OJ%2F%2Fkh8UMmD38mwd63jsEngp4gGXNyPrUjM6QcrjZiIoAJqe7WQbb0nXycpNdyzVXgxJOP8Yy%2Bab5G4m2XA41axKmNLMSP%2BjXv9LwnsQEnJUXJtOB7cd%2BmVcT7JfPiTFcds%2FD5Hrux2MYW1WWmJtLVs1SFg1N5qG0HjsBzg9dnE9fsLTeZx56xTfx0XCU%2FyUe6xO6INtTk%2F8O0gl29Xy9p5qk0IMlE4PbGMmRth4vbFHOxbVgM5hThIMGG2oRgYBfRNNbho0dxMcw5r7i4dAFsoNoJgCpoFw9NkFYwPAAZLLORxRZYFMSI66qzfj3GOHMQ7paAFMWyXr4H9%2FsEqLqqfQ%3D%3D%3C%2FData%3E%3C%2FPidData%3E&hduidToken=&txt_NameE=&txt_Gender=&txt_Father=&txt_MotherF=&txt_MotherM=&txt_MotherL=&txt_DOB=&ddlIDProofType=&txtIDProofNumber=&ddl_Religion=&ddl_SC=&hf_SOI=&hf_TPD=&txt_State=&txt_District=&hf_District=&txt_Building=&txt_Street=&txt_Locality=&txt_vtc=&txt_Pincode=&txt_Address=&txt_Mobile=&txt_AMobile=&txt_Email=&txt_Adhar=&txt_Pan=&txt_Ration=&ddl_HQ=&txt_BU=&txt_SC=&txt_YP=&txt_Stream=&ddl_Score=&txt_PGC=&txt_captcha=&hdret=';

parse_str($json,$arr);

$json = $arr;


//$viewdata = session('viewdata');





$temp =array();
foreach($json as $key => $value)
{

    if($key == '__VIEWSTATE')
    {
      $value = $viewdata['__VIEWSTATE'];
    }


    if($key == '__EVENTVALIDATION')
    {
      $value = $viewdata['__EVENTVALIDATION'];
    }


     if($key == '__VIEWSTATEGENERATOR')
    {
      $value = $viewdata['__VIEWSTATEGENERATOR'];
    }

     if($key == 'txt_aadhar')
    {
      $value = $_POST['EnterAadhaarNumber'];
    }

    if($key == 'PidData')
    {
   /*   $value = '<PidData><Resp errCode="0" errInfo="" fCount="1" fType="0" iCount="0" pCount="0" nmPoints="42" qScore="59
"/><DeviceInfo dpId="Morpho.SmartChip" rdsId="SCPL.WIN.001" rdsVer="1.0.1" dc="46eb9a7f-b88a-436a-94ea-0539ea530cfb" mi="MSO1300E2L0SW" mc="MIID/zCCAuegAwIBAgIGAW2BXfy4MA0GCSqGSIb3DQEBCwUAMIGcMSAwHgYDVQQDDBdEUyBTTUFSVCBDSElQIFBWVCBMVEQgODEYMBYGA1UEMxMPRCAyMTYgU0VDVE9SIDYzMQ4wDAYDVQQJDAVOb2lkYTEWMBQGA1UECAwNVVRUQVIgUFJBREVTSDEMMAoGA1UECwwDRFNBMRswGQYDVQQKDBJTTUFSVCBDSElQIFBWVCBMVEQxCzAJBgNVBAYTAklOMB4XDTE5MDkzMDA4NTEyM1oXDTE5MTAzMDA4NTEyM1owgcUxFDASBgNVBAoMC01BUlBIT1JEUE9DMQwwCgYDVQQLDANEU0ExMTAvBgkqhkiG9w0BCQEWInBhbmthai5hZ2Fyd2FsQHNtYXJ0Y2hpcG9ubGluZS5jb20xDjAMBgNVBAcMBU5vaWRhMRYwFAYDVQQIDA1VdHRhciBQcmFkZXNoMQswCQYDVQQGEwJpbjE3MDUGA1UEAwwucmRfZGV2aWNlXzQ2ZWI5YTdmLWI4OGEtNDM2YS05NGVhLTA1MzllYTUzMGNmYjCCASEwDQYJKoZIhvcNAQEBBQADggEOADCCAQkCggEAnAwmSSshRJanFVPhQMo/de3FqDnWn+SrHmET42uzG5X9tTwYXRDsJkaWMBWihC7Md+mYTpOa1H4f2jZDrZ2V/3PxfxRaWPbIRHt8Ed2iDF33uif0No2lIuPmhT0dbz9O63Cb9jDUzJxmEYApFb6f5dONFpegltijWGJfDvX9XnhYULBfupzmmXwmm7K146v6YCUVPWsfSBhXyI9G57nfIk+KnhCj3Rj+c43nhat+N3fxjYRrCYxROCSIYnazgStxDjNrPrYIU1gWsnHQwNCwihHHIwf6sCRbYGN3YroabduvR1w21IgABkQzfNSa2FE4tCLMbGSf+oAGqzDOlw2huQIDAQABox0wGzAMBgNVHRMEBTADAQH/MAsGA1UdDwQEAwIBhjANBgkqhkiG9w0BAQsFAAOCAQEAiVs/F7A5q8yn+Vtc3hR+BFqqc4vLfFNdP4xrrJ7PVchnFMwEsfyuWe5tDuxRp5S3gpq9jj2m6m5wFIKBA4X8+eDdT3w3FjKe+dXDfLUKRlAXQRFy/YsBLiDPFjKXk5g1uKcqK/aZdSqQrR3bq29P7w2xbwUDnv20yvDjy9zs/sQzAbzVaa2+pbQIvhFhvq6MrSZh+g0Etu0sD5ewtnTpPVkWM5DNMGBrJgRXFGq5vQw4t/Y5wzvwpQn4UhsQtC+HHrOEX0btfqdHZ+5rwvXmN264Gkojitl+XYe9U8AaCZ63GmIDRoBnNuRJkroOscEYRZEnOsXW+ncpncl1R6NfZA==" />
<Skey ci="20191230">qOO6FJ0beISbSqYpyf25m8CHFZTdRVM1UD03judGUMhJ0kfRVghapIif1m8GIOYslpNHxfJ3XGwq/TNjRw+wTxpuNtcygfkys3WNgSAfrQUlUszWd4psOa3hvjgoQu6b7lXla16cmHddODpza4wnDwatJh7WthPraFdq8xoVQS+9bAAlFEUUfD92vPPzDKBF9QXwiuTAE2MsiNYHeqpiovFauvP6ClcJVwsHtuisuuCVEv4/j/ftkngMC4JW1CkNbe3VSvVSlnfRkZNLMGMTyMItuBlHLtM1/Nr6VK9p0PH0WipbW+yo+bgRWLvJx8qse4XY6ug6mX8Vq+sXm5ZS8w==</Skey><Hmac>FiwSPQZNLBjl2CeCCRiN9s+u1WOp1hGE3/VdnJCdvmUDoHSdV1pnOgxGr60VpP4l</Hmac><Data type="X">MjAxOS0wOS0zMFQxNzo1MjoyM9ceK1zugKmCaMIUu2MJH14p2cdI9WHRe6SFn5teWZsz2KkD+ePOK9xYeyBs7tUsxoFfuM1zVsQUeKBzHkMg3W/yaP1vJKbys8cXP+7QtjOfBmyZFwhcfMU47a7Zr+sDsLTzPHXrQHj5qTI7WdO2/sgAAgweVXf4dEqxMlBGRhsiQNZC2yxEn5ljeDJi5PgfjlJcLIBAXPMwaAal/WAY7tQV6IlU3fs/Yp94Ih7gdNSs1kPPLcX6ncgToE0dGnpBB0EFkbmE8vjLvl6hqa3SkZgQbGsxgGB01TuA7hXZL23Jh5t+PCPT2XwoktGzwqTLWVsJRsMkdyQDGhvlgpRAeHy7qyvPC5HYups6f2kLYSJC27lrOKR4iYaNzzYyXwfwI07426R3FiZ22lGU7GGj/N54cRW9NgcOSvKkQVgfajwfcp9AuAc7mzhI7janFvaXmXIRGnPUlvwFDV+BlQKC8BBzu6Ip0s7N92qHwIrHo4MmtDnz4wz5mnirTMZt0Rqe+n6yd1cI/bUnpHxRgsElWUxB8B7D/9bMDFp4EokdABcNWroC9F0qTPlvXEokpgj+QCTb0wiVtc/IeU+l3pOSls2KEwBAKmoAMO/TaaSopJ1ihZmULNdJ6D1WHFMq4rq5p5KdjPuAGjU6lPhzntKOfdv3TsSUw96yBJwVBbzwPsCGmXiuHtaR4uagtwi5R+fR481riw1C8wRGm7CZvDT+WxZWlF/h2YLPCI5Mzwft4cZOFdbYAIsgdtrfpiSEr/lYJOtxjUSORFTYFMJv0Jl0eCwXAlfbtyhCtDtqBG3NlkapOPVP47CaZnxdEevRl/BDloPYUCNdNTJJsshEikPG5DwhOC09isegA0+as5ZCGylF2e78YOkAOLD6B6EiQ6kHd70+5D7qiBCfDuLyHZQp/zR74ASUwWCN8RdGvR/5Dc/kPE6sSTlRSpAefY6Bl2JQIbM9y90oJ46If8GqvxoEEXWgmo+0ZLev4sAquiBq+2MIt7rqCBtU0LLA3yhlr6SFx2CmgUyo3CzemCEYQmsyAjSD5Cp15qpOdt4DQAwad/4d7fYyvg0grhCDtOKlvrrvl4BZJekVSnehucd7NSx6iQSniE/iE6ZVJRpK678idCStIST2q2P4g+wPw0cFfG9sLB1wpCDxPKNUTTwCU7GeJTbR4ypXR+s0gKW02XOr96qf3z6J9FgoWT8iwKwFw9YX4HoeEh2psNSCXwUoSo3O+q6+ds2XO3ZIhRQ9LmPq</Data></PidData>';//urlencode($_POST['PidData']);*/

$value = $_POST['piddata'];


    }


    $temp[$key] = $value;
}

/*
echo '<pre>';

  var_dump($temp);
echo '</pre>';
var_dump(strlen(http_build_query($temp)));
exit;
*/
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,http_build_query($temp));


// In real life you should use something like:
// curl_setopt($ch, CURLOPT_POSTFIELDS,
//          http_build_query(array('postvar1' => 'value1')));

// Receive server response ...
$headers = array();
$headers[] = "Host: ssdm.mp.gov.in";
$headers[] = "User-Agent: Mozilla/5.0 (Windows NT 6.1) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/77.0.3865.90 Safari/537.36";
$headers[] = "Content-Type: application/x-www-form-urlencoded";
$headers[] = "Content-Length: ".strlen(http_build_query($temp));
$headers[] = "Cache-Control: max-age=0";
$headers[] = "Upgrade-Insecure-Requests: 1";
$headers[] = "Origin: http://ssdm.mp.gov.in";
$headers[] = "Accept: text/html,application/xhtml+xml,application/xml;q=0.9,image/webp,image/apng,*/*;q=0.8,application/signed-exchange;v=b3";
$headers[] = "Accept-Language: en-US,en;q=0.5";
//$headers[] = "Accept-Encoding: gzip, deflate";
$headers[] = "Referer: http://ssdm.mp.gov.in/CandidateReg.aspx";
$headers[] = "Connection: keep-alive";
//$headers[] = "Cookie: ASP.NET_SessionId=aq43pvmof35vdyrxbkq0hum1;__AntiXsrfToken=1079eb1a53e14d25a622b419547aced4";
//$headers[] = "Cookie: __AntiXsrfToken=db2b135e8dda408d8faa4a62f5c80cf4";
//$headers[] = "Upgrade-Insecure-Requests: 1";

$headers[] = "Cookie: ASP.NET_SessionId=".get_asp_id();

/*
Accept-Language: en-US,en;q=0.5
Accept-Encoding: gzip, deflate



Connection: keep-alive
Referer: http://ssdm.mp.gov.in/CandidateReg.aspx
Cookie: ASP.NET_SessionId=um2hwim4po2hifcg2rnjzwwu
Upgrade-Insecure-Requests: 1

*/





curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
//curl_setopt($ch,  CURLOPT_VERBOSE, true);
//curl_setopt($ch,  CURLOPT_COOKIE,'ASP.NET_SessionId=aq43pvmof35vdyrxbkq0hum1;__AntiXsrfToken=db2b135e8dda408d8faa4a62f5c80cf4');

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLINFO_HEADER_OUT, true);

curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT , 0);
curl_setopt ($ch, CURLOPT_TIMEOUT  , 1000);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);

$server_output = curl_exec($ch);


$information = curl_getinfo($ch);
//var_dump($information);
//var_dump(curl_error($ch));

//exit;
 $_SESSION['server_output'] = $server_output;
 $_SESSION['postdata'] = $_POST;
 $_SESSION['url'] = 'http://localhost/pancard/admin/';


curl_close ($ch);

header("location:http://localhost/pancard/admin/downloader/fetch-data.php");
exit;
