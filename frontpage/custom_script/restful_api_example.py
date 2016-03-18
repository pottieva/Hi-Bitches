#!/usr/bin/python
#coding=utf-8
import json, httplib
import urllib2
from urllib import urlencode
# import re
import paramiko
import ConfigParser
import platform
# import urllib
# import log_txt
# import slumber
# from release.models import get_result

def get_result(retcode,result):
    a={}
    if retcode==0:
        a['retcode']=retcode
        a['stderr']=''
        a['stdout']=result
    else:
        a['retcode']=retcode
        a['stderr']=result
        a['stdout']=''
    return a

class Rest_api:
    def __init__(self, type):
        plat=platform.system()
        if (plat=="Windows"):
            cf_file='D:\\release\\salt.ini'
        else:
            cf_file='/opt/app/release/salt.ini'
        cf = ConfigParser.ConfigParser()
        cf.read(cf_file)
        if type=='release':
            path=cf.get("release", "path")
            host=cf.get("release", "host")
            user=cf.get("release", "user")
            passwd=cf.get("release", "passwd")
            authpath = path
            authdata = {
                'username': user,
                'password': passwd,
            }
            self.target = host
        elif type=='cmdb':
            path=cf.get("cmdb", "path")
            host=cf.get("cmdb", "host")
            user=cf.get("cmdb", "user")
            passwd=cf.get("cmdb", "passwd")
            authpath = path
            authdata = {
                'username': user,
                'password': passwd,
            }
            self.target = host
        else:
            return get_result(1,'no this type %s' %type)
            raise NameError
        token=self.get_token(authpath, authdata)
        self.header={"Authorization": "Token %s" % token, "Content-Type": "application/json"}
    def get_token(self, authpath, authdata):
        header = {"Content-Type": "application/json"}
        conn = httplib.HTTPConnection(self.target, 80)
        conn.connect()
        content = json.dumps(authdata)
        conn.request('POST', authpath, content, header)
        result = conn.getresponse().read()
        conn.close()
        return json.loads(result)['token']
    def get(self, path):
        conn = httplib.HTTPConnection(self.target, 80)
        conn.connect()
        conn.request('GET', path, '', self.header)
        result = conn.getresponse().read()
        conn.close()
        return json.loads(result)
    def update(self, path, data):
        conn = httplib.HTTPConnection(self.target, 80)
        conn.connect()
        content = json.dumps(data)
        conn.request('PATCH', path, content, self.header)
        result = conn.getresponse().status
        conn.close()
        return result
    def create(self, path, data):
        conn = httplib.HTTPConnection(self.target, 80)
        conn.connect()
        content = json.dumps(data)
        conn.request('POST', path, content, self.header)
        result = conn.getresponse().status
        conn.close()
        return result
    def delete(self, path):
        conn = httplib.HTTPConnection(self.target, 80)
        conn.connect()
        conn.request('DELETE', path, '', self.header)
        result = conn.getresponse().status
        conn.close()
        return result
class Cmd_api:
    def __init__(self,type):
        plat=platform.system()
        if (plat=="Windows"):
            cf_file='D:\\release\\salt.ini'
        else:
            cf_file='/opt/app/release/salt.ini'
        cf = ConfigParser.ConfigParser()
        cf.read(cf_file)
        if type=='lb':
            path=cf.get("lb", "path")
            self.host=cf.get("lb", "host")
            user=cf.get("lb", "user")
            passwd=cf.get("lb", "passwd")
            self.authpath = path
            self.authdata = {
                'username': user,
                'password': passwd,
            }
            self.cmd_path=cf.get("lb", "cmd_path")
        elif type=='hb':
            path=cf.get("hb", "path")
            self.host=cf.get("hb", "host")
            user=cf.get("hb", "user")
            passwd=cf.get("hb", "passwd")
            self.authpath = path
            self.authdata = {
                'username': user,
                'password': passwd,
            }
            self.cmd_path=cf.get("hb", "cmd_path")
        elif type=='cmd_control':
            path=cf.get("cmd_control", "path")
            self.host=cf.get("cmd_control", "host")
            user=cf.get("cmd_control", "user")
            passwd=cf.get("cmd_control", "passwd")
            self.authpath = path
            self.authdata = {
                'username': user,
                'password': passwd,
            }
            self.cmd_path=cf.get("cmd_control", "cmd_path")
        else:
            return get_result(1,'no this type %s' %type)
            raise NameError
        self.header=self.get_token()
    def get_token(self):
        header = {"Content-Type": "application/json"}
        conn = httplib.HTTPConnection(self.host, 80)
        conn.connect()
        content = json.dumps(self.authdata)
        conn.request('POST', self.authpath, content, header)
        result = conn.getresponse().read()
        conn.close()
        token=json.loads(result)['token']
        cmd_header={"Authorization": "Token %s" % token, "Content-Type": "application/x-www-form-urlencoded"}
        return cmd_header
    def post(self,data):
        content = urlencode(data)
        req = urllib2.Request(self.cmd_path,content,self.header)
        result = urllib2.urlopen(req)
        return json.loads(result.read())