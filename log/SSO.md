
	一、单点登录（Single Sign On, SSO） 

	二、企业应用集成（Enterprise Application Integration, EAI）
	
	访问控制四个过程：
	Identification, Authentication, Authorization, Accountability。
	
	SSO 属于 Authorization授权系统，此外还包括，Lightweight Directory Acess Protocol 和 Authorization ticket 。


	三、实现机制
	1.S1没登录时，引导到认证系统中进行登录
	2.身份验证，通过则返回一个认证凭据－－ ticket
	3.访问其他应用时，会带上这个ticket，应用系统会把ticket 送到认证系统进行校验，检查ticket的合法性。
	4. 如果通过检验，用户就可以不用再次登录，直接访问S2，S3系统。



	四、 实现实例


********************************************************************************************
                                OAuth2.0
********************************************************************************************
    response_type [code, token]
    grant_type [authorization_code, password, client_credentials, refres_token]
    token_type [bearer, mac]

    授权码模式 (authorization code):
           client request:
                response_type: code (must)
                client_id: (must)
                redirect_uri: (optional)
                scope: (optional)
                state:　客户端状态，任意值

            server response:
                code: (must) [10min,once =>client_id, redirect_uri]
                state: (must) [与client一致]

            client request:
                grant_type: authorization_code (must)
                code: (must)
                redirect_uri: (must)[与第一步一致]
                client_id: (must)

            server response:
                access_token: (must)
                token_type: [bearer|mac] (must)
                expires_in: 可省略，但其他地方已设置
                refresh_token: (optional) [更新令牌，下一次的访问令牌]
                scope: [与client一致，可省略]　
        


    简化模式（implicit grant type）：
        client request:
            response_type: token (must)
            client_id     (must)
            redirect_uri    (optional)
            scope   (optional)
            state

        server response:
            access_token: (must)
            token_type: (must)
            expires_in: (must) (单位:s)
            scope: (optional)
            state:   [与client一致]

    密码模式 (Resource Owner Password Credential Grant)：
            client request:
                grant_type: password (must)
                username:   (must)
                password: (must)
                scope: (optional)
            server response:
                access_token
                token_type
                expires_in
                refresh_token
            other...

    客户端模式（Client Credentials Grant）：
        client request:
            grant_type: client_credentials
            scope (optional)


        server response:
            access_token
            token_type
            expires_in
            other...

    更新令牌：
       client request:
                grant_type:refresh_token (must)
                refresh_token   (must)
                scope   (<= 上一次scope)

    


	
