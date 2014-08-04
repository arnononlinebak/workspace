class ClassifiedMailer < ActionMailer::Base
  def contact(classified, buyer, sent_at = Time.now) 
    @subject    = 'RailsList: A potential buyer has contacted you' 
    @recipients = classified.email 
    @from       = 'no-reply@yourdomain.com' 
    @sent_on    = sent_at 
    @body["title"] = classified.title 
    @body["email"] = buyer[:email] 
    @body["message"] = buyer[:message] 
  end 
end
