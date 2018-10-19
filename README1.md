## Installation
	composer require ketili/fuzzydm
    
    
## Introduction

This repo is a small PHP library to make multi criteria decisions. It is depended on fuzzy-logic fundamentals and uses simple [membership](https://bit.ly/2NLJIrs) and [agregate](https://en.wikipedia.org/wiki/Aggregate_function) functions without any mathematical library. Using this library you can make decisions based on some predefined numeric features. For example you are manager of some basketball team and you want to make profitable guard transfer for the team and you have some specific requirements: you have limited transfer budget, have some range of weight, age or height, need maximally experienced and young player as possible. This example will be discussed above alongside with library methods and functions.

 ## Example
 
Let's imagine that we have following list of guards with their characteristics:
![]({{site.baseurl}}/img/guards.png)

**1. Age**

You said you need an young player doesn't you? So what is a aproximately good age for being young and also experienced a little bit? I think 24, 25 or 26... or some age nearer those numbers. Let's make membership function to express your requirement. Would be better if we use trapezoid membership function which actually looks like: ![](https://lh3.googleusercontent.com/k4UbxhiXKEn2xpl6ZDsD8jL5ZQyMYogXnBh3B10fp6FyaRqgJ9rDxZYub5LdUy5BifbLqPYMLHh-WLwhNI-b7NWMKJKA-NIlxBNRc_SJlD_dqnY1s0ZHZOnjvkpMGUevm1RVSj5yyAKdgB1OcChUHWkriVn-OCXdfFE2ZEd-_pjYE6m1ow788Ec6Zd2TWQ9ONHfmWgVDJilvHoh13VkmTZasIcRGQzkAW3EhdI_wRBgfnXW5XQAq0Nku_gHlNyJt_jwKOEE1FF6wpYAnuf8qDrqNPuUO4z4eRdQPEsQXoejFt7x9vzW5YPDE_Auv55rwwm0ucO46KvAh8MzSfO_7aD6Zax_6J5FOhPVy13P3ZYf6z08Ran5YvmQME9rBfJcmEj7YtHJ3x71Eo2R35JMBeOKI9SR-9yEAzq34sfmpon76ZDcOwU2E0Q7UB5XMpUyIOdFGRq9Eu_ZpOdMcDYqgR_kRvwozRGZPVfMRVhyBl7AYSmyrauYZXvwyzay4kqvABKGpd74TCUuoN2XGNmIEXnn8roFe0yvN8JIzlWt9Er4OI-NElv-LHXvmr6jnAe9EhY7J-xrKcmnQ1k3jclEVigcTsfBtiQeJQfp4ZSY=w258-h143-no)

where a, b, c and d are numeric parameters, indicating corners of trapezoid-shaped graph. If we take a, b, c and d consecutively 18, 24, 26, 35 we would get graph like that: 
![](https://lh3.googleusercontent.com/M07hoNA4Dorj5B4TLCI6pOj8eyLEYjgtHEWrabqr3RvCBx1v759VhbA4u1203Waff2kO3PeYznEZSUfY6MwkdOQnm5-b4vc5ZPRBp_PfBuwSR08G5M8RPnKSwfwkV0CCM4AwDmfK0wUfGhXhvfozSkJ0RL9itiEVAhbucSqH4VfTD7ZX-hAtd71LLNk1vgKuoEnuMKyUJZxgG4QoIUunlw0fCEA_24LCmnrqf1X71jJNQsH2bSsSqbZsCNNZ_JompwR5Zs4V940Ef8SYuULonXGJhK_8LDIcRAtbV1PBoH7xl2C51CV9at_bokKO3D9uoc81Z2GkCeHYj-Re0P9978IU8jmncrTqwpNWv2RRvNytGyrV22hCaUzjMbN-rMkbONLa-AA56d4Qk184WmePmDuepFaL35_SjaJRyvb_0_M2g_oinTw-mMjg92J0SVKlJ_XYrHJJKJa6DIM7OdYbRthkuTKCJWarFEehHg2oPmUHmv4jb8qKmXV0-blXH61bgYJJGIfBRP6nUwBj1VWcTi3PPLnZV0hmPRPKKL0YmhSG1kjH62N3_LSh7b7kXMqmYTY0aiS7CYP79gSLKAZlzEGFqg9j_b0AuNjLh-4=w640-h480-no)

it means that ideal option for us is age between [24, 26] where function returns 1. Also return value decreasing  when argument approaches to 18 and 35 as shown on graph. It means that you don't need 18 year old player who doesn't have any experience, also you don't need older than 35, it is too old for your team. For example this function estimates 30 old player as 0.55

![](https://latex.codecogs.com/gif.latex?%5Clarge%20f%2830%3B%2018%2C%2024%2C%2026%2C%2035%29%20%3D%200.55)


**2.Years in NBA**

Here we use _triangular membership function_ ![](https://lh3.googleusercontent.com/zR-CQQ1sdy0pkZE1hrOrwI0isMtHdAbTZYqt1YcxUwOfO4bXn6fDMWf9qEvJ5jyR8L2B235mkVmDDiF14xi1vAqdsxPt-gux3QbQKDPaaezJcqa1e2jlaszfB3aP3yZvIEHnrlxM14hXN1E1NQnDMGVe5HD9Ht3Z_9kkPeWsjKHo5S0sUV9TemUEm_BpCf5F1sEusJ1fOOmtRBKm4YOxViqrT2i84LHFw1_NPCj85NnfImsFeCMiK-SQ0DmHg9lB9nnnqQ1smAt46YXWPSfrp_6p_1beubYywf-CROCXOqVCOpzpGn-nqeff9Mg4hvCuIw9GmENbVi9Cyl3ELIVv9P6aOLFJ4yWi4rbRUMZvVybOAeTBSL2oqyuo5X5MYx1qPx8NONp-tg6FRSfK-E2FMgdA0M7fQbPh6UiQv-BYppWtRiy_C2URIMwS5aqVY4vkDtWZAJp8qyFhwkFmdyA-EoVoQp-RKejHYwr4jB8ClV7o7n1GAr46qVeVcc-qj0zFUmRq9icdc8ziHc-6JFg97Yp5tPVXxkHPV5GoqT61ZBOyxIaz_41tCof_XUlxI6zqbb2TIiZhl4IE8Jt4WJi_XYjOsFMZC6dl41hLAfc=w214-h143-no)

where a, b and c are numeric params indicating corners of triangle-shaped graph: 

![](https://lh3.googleusercontent.com/dATKAE-sJlo8g1zqsQNiiKosXc6pCQp8ctiNqqt8T0tqBzQ_MlJ2TPqUdiaasK6SQZEWpiW96jxrK0Pj6EP9I_8qZy8bEv3U01PFLjCXPV1YJADhpyryPOCyfsZNBkPLnxf65VE5u9N-DRTmQxUpnD77pA5bXi929AT89nhjo83AiCnzBFVmu_O0A5Ac2rwrJPLqywijhfmc8qTEzquE2F0Z8J5nXAQfoZ46MxAAI8-3N2kUMnEEB0fq9Q-l_pUqoCXLYfZ-mVnoT1-0GlMKPbSXAQ5q8WgdSGGXNNiSV1FxIwJv41uoVEULyf4UdWtgytYbACAi-QdYF7RgIgGLyvXPKPXSbGPeL7y7rDSm4QPQFhkTPcOgZxq0vYlb1mkhJ6Lc5RwBLiD2mX0sF1WzXFs2PZH_pKR_KIJDiu2FxV-reOmmsVG49V_26_CAxB1V90sGMFokhaXzfO4SuFDCsjW2OE0_yu_tyvXhhiPEnamf7buddlO5lbqHHL6SRrPMXq3VHaHOc0l2Jvjb0qHy4w28qztb0g1PwlB1I1BDLuHEe66G3tr_FZcZHd-Z_rJULpdq0X56_qeuA-DVaOj7ECzSJnP8OZ6pvXarlD4=w640-h480-no)


in this graph a = 0, b = 5, c = 13 and it means that your favorite option would be player with 5 years of NBA experience.  



**3. Cost**

You just have 20 million dollars and you want to not waste all your money but also you don't need to buy cheap player, because in trademarket cost means player efficiency. So let's use triangle function again with parameters a = 0, b = 13 and c = 20

![](https://lh3.googleusercontent.com/4KmPAJMpUjW0oBrNieXh3R0JKVGu2JC56bsgkqjjC_fJwrQt1V2g92f1BTvLz9ye10ATYS7GnpvcwTBP5NtVljBt38J-y-etsTz-dYQxQWmBmWqZRmZ4E9IwSEHATlEHy3OXeG32cBtrxhuNlVKnXCxgxXm-jA9TO0MTau50oBSinfzlI4vW3dpJPrrqrOWkGZDAVCbaXjpcZJT7Fh9KRc2FwiasBX7sNd0laFEG4M9IkqbeQj1ZloF2I0S3iekPcUs61F8LzxBNiKAAFoJiyiy03Q-_WvSX2i8CBWnCqlP-bUFrZSocCvquoe6cjYWLffEpFYW77MDWHjYxAQ6sYEQ1mRidTSfSgXr85xTVuMQbxzN3s1nUoF1lXvpQhBdowFs4_Cbf0-s0cv2e78xAM6eE_1nl9Ch0HaeXemyAaQkWPw-BA-3NW2Qp8gaCCpw304_WoAhHWNokXr2TfuFUm_JTZDmnK5QVTl_feh6qA9W-ww-9px6ptgbe9sonESuVw4xuBRRDGU7Usf2mTbldA4QdEnHOQGTbpIda9YJfgOZt0jsxOlkjEVOdLY4HgOzXondFMn78OBTY-GYmPtkJ31OkjPz7kiK7xqBtUz0=w640-h480-no)



**4.Height**

Of course point guards are not too tall because they should be quick, could move ball fast da have good dribbling skills. There is snippet from wikipedia:

> In the NBA, point guards are usually about 6' 3" (1.93 m) or shorter, and average about 6' 2" (1.88 m) whereas in the WNBA, point guards are usually 5' 9" (1.75 m) or shorter. Having above-average size (height, muscle) is considered advantageous, although size is secondary to situational awareness, speed, quickness, and ball handling skills.

Lets take triangle again, a = 160, b = 188, c = 205

![](https://lh3.googleusercontent.com/gEP8-kD6ATrMcdtNzNYDZwq8trW-L9v1b45o_FqjrVLtdSnekIKJg92Zp9pKZb9XYp2kRNLy2tUTEtUtfAUbgAtRMWgoEpB4bPvkeqHgkAEcDcVOdXRFYdWdVQH6BBlMfO7vgDiW3ulZH08v1wXlHfGl9PWRHD50O6a4TEO4fArI8FNqDB-cVEhdfBPe_P2Ez9iZm-zsKjpk0JZGpgTs05DqSAZHEY-cKRCrNcNaafu-cPfd12h45OiZx3Hg3hSOFzPwPYF1koJq6tYua_PKy0xAi5hoDKAPE7_HLnG9e_wIkap5xLV0mjSWKth9Np4-boEF_fAPZo7bWFbo2U_PJoBlKClxr9DLaHhVP8GtaYk7Pz0i0R6uSWMIv1u2tS2V6cSVfXiKWd0gDmPpIx02gATOcsGTiKD0LPN3oNJR9LGQUDi4_OEWf4ZrDooEN1yZ0k9AkRt845EHmFbIrUYeumM89CR88kJ65dp3oLMBfmAmYkigvSlWAfzucCtY1DfpwxHHvJeFx4GeyxElB9XDpwBvTP82dqX8XI0T9O2wmr9Qf2Q-E32NsEiC7WxN5ByXki_VZEoNCRvQyFzSbPJqPG5Mtonir9LL1Aji22g=w640-h480-no)


**5. Assists per game (APG)**

Here we choose some non fundamental, custom membership function which has horizontal asymptote on y=1

![](https://lh3.googleusercontent.com/5nyi-gpoFxKi3KWzJgRJrSRE_3tzNNPSMJka4636Arxzj6de4MBEG6pSY4GmMJmwBhUv9AFrXiGDX4-s-capAq_YDOyYdybZC8yib4sFuy8fm6u364jCV10VetuKI-sihylRuarCtzYqzjxEt-0X58tynlXEwE2tYou2dBHKbaVNunnAD44S4xQe5cI5N4sgecV0UZrtIK7A85OG8W-6SrjAQTaw8VByXinQd61XaFVD__ziBvOzkPp0EBHBa0UqVmnNcmzpHOWWcSI0YBP2nzcZdh8zDNshzKZD6fAotc9XCNJGXyeIYWgU27LuihzzjHlSSkUOlRdOr-y_PffdFhts046yxBXlh6-2gW1JMO95p3Mttjqg-FZrjUXZB1Ktc8p8Z01OwffmrP-_lB0M7BwLub6BnqjX0hTH6hSk9AyDVQ9xi4tATN_0OP3LvfbWvCCF0-O2GDrME5j5RAj_c0oyzy5ukPUFhoA9n_xaaf6jNJ_Jzgg4lp0NPVofbJIxAKxiSt8rUJqwgXpgqoKHy2FlLAGcRpj22_FpUwMSx94uPQ_AjqNXUcMHVPJM-paKz2_Xd986V-8bnYpsxLCaTKw6J-rXeI1SR2bTvXg=w640-h480-no)

this means that function has value 0 at point x = 1 and it increases monotonously by increasing **x** and never becomes equal to 1 because function has asympote **y = 1**. Here is a formula of this graph:

![](https://latex.codecogs.com/gif.latex?%5Clarge%20f%28x%29%20%3D%20%5Cfrac%7Bx-1%7D%7Bx-0.2%7D)


**6. Three point percentage (3P%)**

We should take same type of function here but with different parameters:

![](https://latex.codecogs.com/gif.latex?%5Clarge%20f%28x%29%20%3D%20%5Cfrac%7Bx-20%7D%7Bx-19%7D)



![](https://lh3.googleusercontent.com/aFaQ3_4NAzHNSvfgcdZd0F6mYgkLvXD2ubC2HpQd8hztb_EeFHRVDrHEJl_5ahuRa6qa4A9IQEbp_akq8IOS8pqjzJoxcXpJi0rLpkoNtk5qlFhzhJ1rscXZ4gzAjX1P0nbGCGdVDfo9hg3tmj08sE8672884dOqIy5nG7UU8flzEk0OvajgEatt-Z1msLOXivFtIBMef2ybdtXSUx3JzeSWMXJ2qbW_krE4Iw9oK9HdsmOzG3A2Wjgnhx9_O7ZgS91W55EiKAhZTZp39A6V4wFKdcLgFN2yy4aAQz0kJBLtkGiJLFhDW66a9LPV6XbkxHpOieVpqL-L8WJARbH1luVjoYCKd67J-2B3AIP0wlsIvc5gxBsI7XF6JpAla_-itIsQbq8iLy4eDTYW42fxFKBzdaVSrMemJx6KC8GxDM6412dbjEXUiGAvrG7ChlaWHB1cDoTg_PYeEYcygoDGePBo5MDIDFbszKQY8qQv7CaBNCrH9cEfvNSk_7Q4s6oUGfaRA3oQyabwP5WG1ROOv9BC2w26NxI6IUl1Lcow0S-X0X9NBnOMrRs7fPietM0waHg0VF2ZKdh6IQTa_ylgIQyrOdgJaUegaelXjfg=w640-h480-no)




## Aggregation

Lets calculate values of membership functions for example for **JJ Barea**:

![](https://latex.codecogs.com/gif.latex?%5Clarge%20age%2833%29%20%3D%200.22)

![](https://latex.codecogs.com/gif.latex?%5Clarge%20height%28182%29%20%3D%200.78)

![](https://latex.codecogs.com/gif.latex?%5Clarge%20tpp%2835.4%29%20%3D%200.94)

![](https://latex.codecogs.com/gif.latex?%5Clarge%20apg%283.9%29%20%3D%200.78)

![](https://latex.codecogs.com/gif.latex?%5Clarge%20years%2811%29%20%3D%200.25)

![](https://latex.codecogs.com/gif.latex?%5Clarge%20cost%289.2%29%20%3D%200.71)

so we have evaluations for each characteritic of player and we need to aggregate them into single evaluation. Here is many [aggregate functions](https://en.wikipedia.org/wiki/Aggregate_function), but for simplicity we can just use most famous aggregate function - [Arithmetic Mean](https://en.wikipedia.org/wiki/Arithmetic_mean)
![](https://wikimedia.org/api/rest_v1/media/math/render/svg/90330653b40adf032ea8e144f84d7eec1a88054d)

So aggregated evaluation of **JJ Barea** would be:

![](https://latex.codecogs.com/gif.latex?A%20%3D%20%5Cfrac%7B1%7D%7B6%7D%280.22%20&plus;%200.78%20&plus;%200.94%20&plus;%200.78%20&plus;%200.25%20&plus;%200.71%29%20%3D%200.613)

and full table of evaluations looks like that: 

![](https://lh3.googleusercontent.com/OpOYfYWuhAxOBIjCPavdXWkPcGF5eGO3LE6RN1SmoMXkR2VhMTD6JTTQhmOnwGMwXa3oHjb0YmWMslbv3xsO3QkSr4tmNHbS4b7Traj__OYTlZLnDb_Owdfc6GT_5sZACe0P_OHGXEtTPOt3DKM4nfXdbwHlwbc-0uAiDc5ax8pDpH9PO4cO6X4AGtvnrLsCaJNGnJJ63ZAHI22ieEXI4fBgh8jn5B_xNP8DrgcI4cdpuVoBmHQrSjBZ4tUAbkCUn2IqkATC-AEaiFsXwAkeBz_HFZNe9TGrUYF_5MCI1GBPwZYBWe7hhG_jbG2bjBTV71CZP5D3O_BPR8q7K_xkrVw0RTkaPlxvIBpU5r0Dyiwi8W_VW2MjBZCoFUY1gyMJCdez8SFNwkBaCLqiO9rDMG_VONh2CuDX-FEcaxUap4dzVMlDEZrd8YeMpeWOfWC2QYdTgkteGhU4Mx3e4fcU1ux5ZPtYhgQ0K5jW61MzVw57VG09RPjyOVtGII77YtkzHC7v6IevYfzx7vEJqN-Z4zgeZAhRP6W79Rah4rRVwNhSFBP0ZQ6migxoSsGm4Xmkm-jhnqpAb56jGeUzz527fG4FoCP8P4TvYbNrr84=w263-h418-no)


## Feedbacks and Pull Requests

Any kind of pull requests will be acceptable. 

**note:**  _There are few amount of membership and aggregate functions and I think most desirable pull requests would be about them_

## C# version of this Repo:

[https://github.com/goodot/fuzzy-decision-maker](https://github.com/goodot/fuzzy-decision-maker)

(not finished yet)
